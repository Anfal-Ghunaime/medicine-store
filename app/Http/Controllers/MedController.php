<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Med;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//medicines and warehouse seeders
class MedController extends Controller
{
    public function addMed (Request $request): JsonResponse {
        $request->validate([
            'warehouse' => ['required'],
            't_name' => ['required'],
            's_name' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg,bmp'],
            'cat' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'exp_date' => ['required'],
            'company' ,
        ],[
            't_name.required'=>'trade name field is required.',
            's_name.required'=>'scientific name field is required.',
            'cat.required'=>'classification field is required.',
            'price.required'=>'price field is required.',
            'quantity.required'=>'quantity field is required.',
            'exp_data.required'=>'expiration date field is required.',
        ]);
        $image = $request['image'];
        $med_image = null;
        if($request->hasFile('image')){
            $med_image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$med_image);
            $med_image = 'images/'.$med_image;
        }
        $time = Carbon::parse($request['exp_date']);
        $cat = Cat::query()->where('cat', '=' ,$request['cat'])->first();
        $warehouse = User::query()->where('id',$request['warehouse'])->first();
        $medicine = Med::query()->create([
            'cat_id' => $cat['id'],
            'cat_name' => $cat['cat'],
            'warehouse_id' => $warehouse['id'],
            'warehouse_name' => $warehouse['name'],
            't_name' => $request['t_name'],
            's_name' => $request['s_name'],
            'image' => $med_image,
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'exp_date' => $time,
            'company' => $request['company'],
        ]);
        $medicine['image'] = asset($medicine['image']);
        return response()->json('success');
    }

    public function getRandomMed (): JsonResponse {
        $meds = Med::query()->inRandomOrder()->take(10)->get(['id','t_name', 'image']);
        foreach ($meds as $med){
            $med['image'] = asset($med['image']);
        }
        return response()->json($meds);
    }

    public function details (Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'exists:meds,id'],
        ]);
        $med = Med::query()->where('id', '=', $request['id'])->first();
        $med['image'] = asset($med['image']);
        return response()->json([$med]);
    }

    public function listAllMed (): JsonResponse
    {
        $meds = Med::all();
        foreach ($meds as $med){
            $med['image'] = asset($med['image']);
        }
        return response()->json($meds);
    }

    public function wareMeds (Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required'],
        ]);
        $meds = Med::query()->where('warehouse_id', $request['id'])->get();
        foreach ($meds as $med){
            $med['image'] = asset($med['image']);
        }
        return response()->json($meds);
    }

    public function updateMed(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'exists:meds,id'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg,bmp'],
            'exp_date',
        ]);
        $med = Med::query()->where('id', $request['id'])->first();
        $image = $request['image'];
        if($request->hasFile('image')){
            $med_image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$med_image);
            $med_image = 'images/'.$med_image;
            $med->update([
                'image' => $med_image,
            ]);
        }
        if($request['exp_date']){
            $time = Carbon::parse($request['exp_date']);
            $med->update([
               'exp_date' => $time,
            ]);
        }
        $med->fill($request->only([
            't_name',
            's_name',
            'cat_name',
            'price',
            'quantity',
            'company' ,
        ]))->save();
        return response()->json('medicine updated successfully');
    }
}
