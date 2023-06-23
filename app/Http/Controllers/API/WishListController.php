<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WishListController extends Controller
{
    public function get(){
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->get();
        $response = [
            "status" => true,
            "wishlist" => $wishlist
        ];
        return response($response, 200);
    }

    public function add(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'film_id' => 'required'
        ]);
        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input = ['user_id'=>$user->id, 'film_id' => $request->film_id];
        $wishlist = Wishlist::create($input);

        if($wishlist){
            $response = [
                "status" => true,
                "message" => "film has been successfully added to wishlist",
            ];
            return response($response, 200);
        }else{
            $response = [
                "status" => false,
                "message" => "Couldnt add to wishlist"
            ];
            return response($response, 200);
        }
    }
}
