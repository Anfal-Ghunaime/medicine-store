<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Med;
use App\Models\Order;
use App\Models\OrderMed;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use App\Notifications\OrderStateNotification;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function order(Request $request): JsonResponse
    {
        $total_price = 0;
        $warehouses = [];
        $orders = [];
        $order_id = 0;
        $name = false;
        $r = [];
        $validator = Validator::make($request->all(), [
            'id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $carts = Cart::query()->where('user_id', $request['id'])->get();
        $i = 0;
        foreach ($carts as $cart){
            $r[$i]['name'] = $cart['name'];
            $r[$i]['quantity'] = $cart['quantity'];
            $i ++ ;
        }
        $meds = [];
        foreach ($r as $med){
            $medicines = Med::query()->where('t_name', $med['name'])->get();
            if(!$medicines){
                return \response()->json('no medicine with this name');
            }
            foreach ($medicines as $medicine){
                if($medicine['quantity'] < $med['quantity']){
                    continue;
                }
                if(!$meds){
                    $meds[] = $medicine;
                }
                foreach ($meds as $med){
                    if ($med['t_name'] == $medicine['t_name']){
                        $name = true;
                    }
                }
                if($name==false){
                    $meds[] = $medicine;
                }
                $name = false;
            }
        }
        if($meds){
            foreach ($r as $med){
                $name = null;
                $quantity = 0;
                foreach ($meds as $me){
                    $quantity = $me['quantity'];
                    if ($me['t_name'] == $med['name']){
                        $name = $me['t_name'];
                    }
                }
                if(!$name){
                    return \response()->json(['no enough quantity from the med',$med['name'], 'we have just this quantity', $quantity]);
                }
            }
        }else{
            return \response()->json('no enough quantity from all these meds');
        }
        foreach ($meds as $med) {
            if(!$warehouses){
                $warehouses[] = $med['warehouse_id'];
            }
            foreach ($warehouses as $warehouse){
                if($warehouse == $med['warehouse_id']){
                    break;
                }
                $warehouses [] = $med['warehouse_id'];
            }
        }
        foreach ($warehouses as $warehouse){
            $order = [];
            foreach ($orders as $ord){
                if($ord['warehouse_id'] == $warehouse){
                    $order[] = $warehouse;
                }
            }
            if(!$order){
                $order = Order::query()->create([
                    'pharmacist_id' => $request['id'],
                    'warehouse_id' => $warehouse,
                    'total_price' => $total_price,
                ]);
                foreach ($r as $me){
                    foreach($meds as $med){
                        if($med['warehouse_id'] == $warehouse && $me['name'] == $med['t_name']){
                            OrderMed::query()->create([
                                'order_id' => $order['id'],
                                'med_id' => $med['id'],
                                'quantity' => $me['quantity'],
                            ]);
                            $total_price += $me['quantity']*$med['price'];
                        }
                    }
                }
                $order->update([
                    'total_price' => $order['total_price']+$total_price,
                ]);
                $orders [] = $order;
                $total_price = 0;
            }
        }
        foreach ($orders as $order){
            $order_id = $order['id'];
            $user = User::query()->where('id', $order['warehouse_id'])->first();
            $message = ['You have a new order!'];
            $user->notify(new NewOrderNotification($user['id'],$order['id'],$message));
        }
        $user = User::query()->where('id', $request['id'])->first();
        $message = ['your order is preparing'];
        $user->notify(new OrderStateNotification($user['id'],$order_id,$message));
        foreach ($carts as $cart){
            $cart->delete();
        }
        return response()->json($orders);
    }

    public function changeState(Request $request): JsonResponse
    {
        $request->validate([
            'order_id' => ['required','exists:orders,id'],
            'warehouse'
        ]);
        $order = Order::query()->where('id', '=', $request['order_id'])
            ->where('warehouse_id', $request['warehouse'])
            ->first();
        $request->validate([
            'delivery_status' => ['required', Rule::in(['preparing', 'sent', 'delivered'])],
            'payment_status' => ['required', Rule::in(['paid', 'unpaid'])],
        ]);
        if(!$order){
            return \response()->json(
                'no order'
            );
        }
        $order->update([
            'delivery_status' => $request['delivery_status'],
            'payment_status' => $request['payment_status'],
        ]);
        if($order['quantity_updated']== false && [$order['delivery_status'] == 'sent'|| $order['delivery_status'] == 'delivered']){
            $ordMeds = OrderMed::query()->where('order_id', '=', $order['id'])->get();
            foreach ($ordMeds as $ordMed){
                $med = Med::query()->where('id', '=', $ordMed['med_id'])->first();
                $newQuantity = $med['quantity'] - $ordMed['quantity'];
                if($newQuantity == 0){
                    $med->delete();
                }
                $med->update([
                    'quantity' => $newQuantity,
                ]);
            }
            $order->update([
                'quantity_updated' => true,
            ]);
            if($order['delivery_status'] == 'delivered'){
                $order->update([
                    'delivered_at' => Carbon::now(),
                ]);
            }
        }
        $user = User::query()->where('id', $order['pharmacist_id'])->first();
        $message = ['Your order has been' ,$order['delivery_status']];
        $user->notify(new OrderStateNotification($user['id'], $order['id'],$message));
        return response()->json('success');
    }

    public function myOrders(Request $request): JsonResponse
    {
        $request->validate([
            'id'
        ]);
        $pharmacist_id = $request['id'];
        $orders = Order::query()->where('pharmacist_id', '=', $pharmacist_id)->get();
        return response()->json($orders);
    }

    public function allWarehouseOrder(Request $request): JsonResponse
    {
        $request->validate([
            'id'
        ]);
        $wareOrders = Order::query()->where('warehouse_id', $request['id'])
            ->with('pharmacist')
            ->get();
        return \response()->json($wareOrders);
    }

    public function orderMeds(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'exists:orders,id'],
        ]);
        $meds = [];
        $orderMeds = OrderMed::query()->where('order_id', $request['id'])->get();
        foreach ($orderMeds as $orderMed){
            $meds[] = Med::query()->where('id', $orderMed['med_id'])->first();
        }
        foreach ($meds as $med){
            $med['image'] = asset($med['image']);
            foreach ($orderMeds as $orderMed){
                if($orderMed['med_id'] == $med['id']){
                    $med['quantity'] = $orderMed['quantity'];
                }
            }
        }
        return \response()->json($meds);
    }

}
