<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Med;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart (Request $request): JsonResponse
    {
        $request->validate([
            'user_id',
            'med_id',
            'quantity'
        ]);
        $med = Med::query()->where('id', $request['med_id'])->first();
        $cart = Cart::query()->create([
            'user_id' => $request['user_id'],
            'med_id' => $request['med_id'],
            'name' => $med['t_name'],
            'image' => $med['image'],
            'quantity' => $request['quantity']
        ]);
        return response()->json('success');
    }

    public function myCart(Request $request): JsonResponse
    {
        $request->validate([
            'id'
        ]);
        $carts = Cart::query()->where('user_id', $request['id'])->get();
        foreach ($carts as $cart){
            $cart['image'] = asset($cart['image']);
        }
        return response()->json($carts);
    }
}
