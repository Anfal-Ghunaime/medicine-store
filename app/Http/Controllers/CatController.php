<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Med;
use Illuminate\Http\JsonResponse;

class CatController extends Controller
{
    public function getCatMed(Request $request): JsonResponse
    {
        $request->validate([
            'cat'=>['exists:cats,cat'],
        ],[
            'cat.exists' => 'classification is not exist'
        ]);
        $meds = Med::query()->where('cat_name', '=', $request['cat'])->get();
        foreach ($meds as $med){
            $med['image'] = asset($med['image']);
        }
        return response()->json($meds);
    }

    public function getCats(): JsonResponse
    {
        $cats = Cat::all('id','cat');
        return response()->json($cats);
    }

    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'word' => ['required'],
        ]);
        $med = Med::query()->where('t_name', $request['word'])
            ->orWhere('s_name', $request['word'])
            ->first();
        $med['image'] = asset($med['image']);
        if(!$med){
            $med = Cat::query()->where('cat', $request['word'])->first();
        }
        return response()->json($med);
    }

    public function wareCatMed(Request $request): JsonResponse
    {
        $request->validate([
            'warehouse' => ['required'],
            'cat' => ['required'],
        ]);
        $meds = Med::query()->where('warehouse_id',$request['warehouse'])
            ->where('cat_name', $request['cat'])
            ->get();
        return response()->json($meds);
    }
}
