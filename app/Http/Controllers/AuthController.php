<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function pharRegister(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'digits:10', 'unique:users,phone'],
            'password' => ['required','confirmed']
        ],[
            'name.required'=>'name field is required.',
            'phone.required'=>'phone field is required.',
            'password.required'=>'password field is required.',
            'phone.digits'=>'The phone field must be 10 digits.',
            'phone.unique'=>'this phone number has already been taken.',
            'password.confirmed' => 'The password field confirmation does not match.'
        ]);
        $pharmacist = User::query()->create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'password' => $request['password'],
        ]);
        $token = $pharmacist->createToken("API_TOKEN")->plainTextToken;
        $data = [];
        $data['pharmacist'] = $pharmacist;
        $data['token'] = $token;
        return response()->json($data);
    }

    public function whRegister(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'digits:10', 'unique:users,phone'],
            'password' => ['required','confirmed']
        ],[
            'name.required'=>'name field is required.',
            'phone.required'=>'phone field is required.',
            'password.required'=>'password field is required.',
            'phone.digits'=>'The phone field must be 10 digits.',
            'phone.unique'=>'this phone number has already been taken.',
            'password.confirmed' => 'The password field confirmation does not match.'
        ]);
        $warehouse = User::query()->create([
            'is_warehouse' => true,
            'name' => $request['name'],
            'phone' => $request['phone'],
            'password' => $request['password'],
        ]);
        $token = $warehouse->createToken("API_TOKEN")->plainTextToken;
        $data = [];
        $data['warehouse'] = $warehouse;
        $data['token'] = $token;
        return response()->json($data);
    }

    public function Login(Request $request): JsonResponse
    {
        $request->validate([
            'phone' => ['required', 'digits:10' ,'exists:users,phone'],
            'password' => ['required']
        ],[
            'phone.required'=>'phone field is required.',
            'password.required'=>'password field is required.',
            'phone.digits'=>'The phone field must be 10 digits.',
            'phone.exists'=>'invalid phone number.',
        ]);
        $user = User::query()->where('phone', '=', $request['phone'])->first();
        if(!$user || !Hash::check($request['password'] , $user['password'])){
            return response()->json([
                'status' => 0,
                'data' => [],
                'message' => 'wrong password!.',
            ], 405);
        }
        $token = $user->createToken("API_TOKEN")->plainTextToken;
        $data = [];
        $data['user'] = $user;
        $data['token'] = $token;
        return response()->json($data);
    }

    public function Logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json('Logged out successfully');
    }

}
