<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Med;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class FavoriteController extends Controller
{
    public function addToFavorite (Request $request): JsonResponse
    {
        $request->validate([
            'phar_id',
            'med_id',
        ]);
        $med = Med::query()->where('id', '=', $request['med_id'])->first();
        if(!$med){
            return response()->json('no medicine with this name!');
        }
        $favorite = Favorite::query()->where('user_id', '=', $request['phar_id'])
            ->where('med_id', '=', $med['id'])->first();
        if(!$favorite){
            Favorite::query()->create([
                'user_id' => $request['phar_id'],
                'med_id' => $med['id'],
            ]);
            return response()->json('medicine added to favorite successfully');
        }
        return response()->json('this medicine has been already added to favorite');
    }

    public function myFavorite (Request $request): JsonResponse
    {
        $request->validate([
            'id'
        ]);
        $favorites = Favorite::query()->where('user_id', $request['id'])->get();
        $favMeds = [];
        foreach ($favorites as $favorite){
            $med = Med::query()->where('id', '=', $favorite['med_id'])->first(['id','t_name','image']);
            $favMeds[] = $med;
        }
        foreach ($favMeds as $favMed){
            $favMed['image'] = asset($favMed['image']);
        }
        return response()->json($favMeds);
    }

    public function removeFromFavorite (Request $request): JsonResponse
    {
        $request->validate([
            'med_id' => ['required', 'exists:favorites,med_id'],
            'phar_id'
        ]);
        Favorite::query()->where('user_id', '=', $request['phar_id'])
            ->where('med_id', '=', $request['med_id'])->delete();
        return response()->json('medicine removed from favorite successfully');
    }
}
