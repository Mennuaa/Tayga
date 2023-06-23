<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Http\Resources\TourResource;
use App\Models\Review;
use App\Models\Room;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function add_room_tour(Request $request){
        $room = Room::where('name', 'like', '%' . $request->name . '%')->get();
        return $room;
    }

    public function get($id){
        $tour = Tour::find($id);
        if($tour){
            $response = [
                "status" => true,
                "tour" => TourResource::make($tour)
            ];
            return response($response, 200);
        }
        $response = [
            "status" => false,
            "tour" =>'tour is not found'
        ];
        return response($response, 200);
    }

    public function all(){
        $tours = Tour::all();
        $response = [
            "status" => true,
            "tours" => TourResource::collection($tours)
        ];
        return response($response, 200);
    }

    public function get_room($id){
        $room = Room::find($id);

        $response = [
            "status" => true,
            "room" => RoomResource::make($room)
        ];
        return response($response, 200);
    }

    public function all_room(){
        $rooms = Room::all();
        $response = [
            "status" => true,
            "room" => RoomResource::collection($rooms)
        ];
        return response($response, 200);
    }

    

    public function filter(Request $request){
        $tour = Tour::all();

        if($request->first_cheap){
            $tour = Tour::orderBy('price', "asc")->get();
        }
        if($request->first_high){
            $tour = Tour::orderBy("price", 'desc')->get();
        }
        if($request->popular){
            $tour = Tour::orderBy('stars', "desc")->get();
        }
        if($request->price_from && $request->price_to){
            $tour = Tour::whereBetween('price',[$request->price_from,$request->price_to])->get();
        }
        if($request->rating){
            if($request->rating == "best"){
                $tour = $tour->where('stars', "=" , 5);
            }
            if($request->rating == "good"){
                $tour = $tour->where('stars', ">=" , 4);
            }
            if($request->rating == "middle"){
                $tour = $tour->where('stars', "<=" , 4);
            }
        }
        return TourResource::collection($tour);
    }
}
