<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Http\Resources\ManagerResource;
use App\Http\Resources\StudioResource;
use App\Http\Resources\UserResource;
use App\Models\StudiosManager;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUser($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json([
                "message"=> 'user is not found'
            ], 404);
        }
        if($user){
            if($user->role_id == 3){
                $response = [
                    "status" => true,
                    "user" => StudioResource::make($user)
                ];
            return response($response, 200);
            }else if($user->role_id == 2){
                dd(StudiosManager::where('manager_id',9));
                $response = [
                    "status" => true,
                    "user" => ManagerResource::make($user)
                ];
                return response($response, 200);
            }
            $response = [
                "status" => true,
                "user" => UserResource::make($user)
            ];
            return response($response, 200);
        }
    }

    public function updateProfile(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json([
                "message"=> 'user not found'
            ], 404);
        }
        if($user->id == $request->user()->id){
           
            $user->update($request->all());
            $response = [
                "message" =>"Profile updated successfully",
                "user" => $user
            ];
            return response($response, 200);
        }
    }
    public function changePassword(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json([
                "message"=> 'user not found'
            ], 404);
        }
        
        if($user->id == $request->user()->id){
            if($request->has('password')){
                    if($request->has("new_password")){
                        if($request->new_password == $request->confirm_password){
                            $user->password = Hash::make($request->new_password);
                            $user->update();
                        }else{
                            return response()->json([
                                "message"=> 'password confirmation is not right'
                            ], 200);
                        }
                    }else{
                        return response()->json([
                            "message"=> 'write new password'
                        ], 200);
                    }
            }else{
                return response()->json([
                    "message"=> 'previous password didnt found'
                ], 200);
            }
            $response = [
                "status" => true,
                "user" => $user
=======
use App\Http\Resources\UserResource;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function edit(Request $request){
        $user = Auth()->user();
        $user = User::find($user->id);
        $photoUrl = '';
        if($request->file('avatar')){
            $fileName = $request->file('avatar')->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $request->file('avatar')->move(public_path('/img/user'), $newName);
            $photoUrl = url('/img/user/'.$newName);
            $user->avatar = $photoUrl;
        }
        $user->update($request->all());
        $user->save();
        $response = [
            "status" => true,
            "message" => 'Пользователь был успешно изменен',
            "user" => UserResource::make($user)
        ];
        return response($response, 200);
    }

    public function send_message(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $user = auth()->user();

        $input = [
            "user_id" => $user->id,
            "email" => $request->email,
            "message" => $request->message,
        ];

        $contact_us = ContactUs::create($input);
        if($contact_us){
            $response = [
                "status" => true,
                "message" => 'Сообщение было успешно отправлено',
>>>>>>> aa3445f (projects done)
            ];
            return response($response, 200);
        }
    }
}
