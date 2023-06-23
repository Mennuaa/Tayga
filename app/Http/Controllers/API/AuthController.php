<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signUp(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = [
                "email" => $request->email,
                "password" => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ];
        
        if(User::where('email', $request->email)->first()){
            $response = [
                'success' => false,
                'message' => 'Пользователь с таким эмайл существует'
            ];
            return response()->json($response, 200);
        }

        $user = User::create($input);
        if($user) {
            $success['token'] = $user->createToken('Chattydate')->plainTextToken;
            $success['user'] =UserResource::make($user);
        Auth::login($user);
        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Пользователь успешно зарегистрирован'
        ];
        return response()->json($response, 200);
     }
             $response = [
            'success' => false,
            'message' => 'User cant registrate'
        ];
     return response()->json($response, 400);
    }

    public function signIn(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $success['token'] = $user->createToken('Chattydate')->plainTextToken;
        $success['user'] =UserResource::make($user);
        auth()->login($user);
        $response = [
            'success' => true,
            'data' =>$success,
            'message' => 'Пользователь был успешно авторизован'
        ];
        return response()->json($response, 200);
        }else{
            $response = [
                'success' => false,
                'message' => 'Не авторизован',
            ];
            return response()->json($response, 400);
        }
    }
}
