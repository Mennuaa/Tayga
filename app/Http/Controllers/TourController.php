<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\Room;
use App\Models\Tour;
use App\Models\TourImage;
use App\Models\TourPrivilage;
use App\Models\TourRooms;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TourController extends Controller
{

    # all tours
    public function all(){
        $tours = Tour::all();
        $avatar = TourImage::all();
        return view('tour.tours', ['tours'=>$tours , "avatar"=>$avatar]);
    }
    # add tour view

    public function addTour(){
        return view('tour.add_tour');
    }

    # add tour request

    public function add(Request $request){
        $input = [
            "name" => $request->name,
            "date" => $request->date,
            "days" => $request->days,
            "text" => $request->text,
            "subtitle" => $request->subtitle,
            "price" => $request->price,
            "longitude" => $request->longitude,
            "latitude" => $request->latitude,
            "place_name" => $request->place_name,
            "tour_advantages" => $request->tour_advantages,
            "tour_privilages" => $request->tour_privilages,
            "stars" => $request->stars,
            "placement_stars" => $request->placement_stars,
            "service_stars" => $request->service_stars,
            "eating_stars" => $request->eating_stars,
        ];

       $tour =  Tour::create($input);
       if($tour){

        # if there are few images , foreach in array and add all to db
        if ($request->has('avatars')) {
            $photoUrl = '';
         foreach ($request->avatars as   $avatar) {
            $fileName = $avatar->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $avatar->move(public_path('/img/tour'), $newName);
            $photoUrl = url('/img/tour/'.$newName);
                TourImage::create([
                "tour_id" => $tour->id,
                "image" => $photoUrl
            ]);
         }
        }
        return redirect(route('tour.all'))->with(['createdSuccess' => "Тур успешно создан"]);
       }
    }

    # edit tour view

    public function editTour($id){
        $tour = Tour::find($id);
        session(['tour_link' =>  request()->path()]);
        $images = TourImage::where("tour_id", $id)->get();
        $rooms = TourRooms::where('tour_id', $id)->get();
        $all_rooms = Room::all();
        $reviews = Review::where("tour_id", $id)->get();
        $all_review_images = ReviewImage::all();
        return view('tour.edit_tour', [
        'tour' => $tour, 
        "images" => $images, 
        "rooms" => $rooms , 
        "all_rooms" => $all_rooms,
        "reviews" => $reviews,
        "all_review_images" => $all_review_images
    ]);

    }
    public function updateTour(Request $request , $id){
        $tour = Tour::find($id);
        $tour->update($request->all());
        return back()->with(['updateSuccess'=> 'Тур был успешно изменен']);
    }
    # delete image for tour

    public function delete_image($id){
        $tour_image = TourImage::find($id);
        $tour_image->delete();
        return back()->with(["imageDelete"=>"Фото было успешно удалено"]);
    }
    # add image for tour
    public function add_image(Request $request){
        if ($request->has('avatars')) {
            $photoUrl = '';
         foreach ($request->avatars as   $avatar) {
            $fileName = $avatar->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $avatar->move(public_path('/img/tour'), $newName);
            $photoUrl = url('/img/tour/'.$newName);
                TourImage::create([
                "tour_id" => $request->tour_id,
                "image" => $photoUrl
            ]);
         }
        }
        return back()->with(["imageADD"=>"Фото было успешно добавлено"]);

    }

    public function get_tour($id){
        $tour = Tour::find($id);
        $images = TourImage::where("tour_id", $id)->get();
        return view('tour.get_tour', ["tour"=>$tour, "images" => $images]);
    }
    # Rooms

    public function rooms(){
        $rooms = Room::all();
        return view('tour.room.rooms', ["rooms"=>$rooms]);
    }


    public function addRoom(Request $request){
        return view('tour.room.add_room', ['request'=>$request]);
    }

    public function storeRoom(Request $request){
        $photoUrl = '';
        if($request->has('avatar')){
            $fileName = $request->avatar->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $request->avatar->move(public_path('/img/tour'), $newName);
            $photoUrl = url('/img/tour/'.$newName);
        }

        $input = [
            "name" => $request->name,
            "subinfo" => $request->subinfo,
            "comforts" => $request->comforts,
            "rating" => $request->rating,
            "services" => $request->services,
            "avatar" => $photoUrl,
        ];

        $room = Room::create($input);
        if($room){
            return redirect(route('rooms.all.view'))->with(['createdSuccess'=> 'Номер был успешно добавлен']);
        }else{
            return back()->withInput($request->only('name', 'comforts', 'rating', 'subinfo','services'))->with(['couldntCreate'=> 'Убедитесь что все данные правильны']);
        }
    }
    # get room
    public function room($id){
        $room = Room::find($id);
        return view('tour.room.room', ['room' => $room]);
    }
    # add room to tour view
    public function add_room_tour($id){
        $tour = Tour::find($id);
        $rooms = Room::all();

        return view('tour.add_room_tour',['rooms' => $rooms, "tour" => $tour]);
    }

    public function add_room_method(Request $request, $id){
        $tour = Tour::find($id);
        $room_id = $request->room_id;
        // dd($request->all());
        TourRooms::create([
            "tour_id" => $tour->id,
            "room_id" => $room_id
        ]);
        return back()->with(['updateSuccess' => 'Номер успешно добавлен к туру']);
    }

    public function delete_tour_room(Request $request , $id){
        
        $tour_room = TourRooms::where('tour_id', $id)->where('room_id', $request->room_id)->first();

        $tour_room->delete();
        return back()->with(['DeleteSuccess'=> 'Номер был успешно удален']);
        }

        public function room_edit(Request $request , $id){
            $room = Room::find($id);
            if($request->has('avatar')){
                $photoUrl = '';
                if($request->has('avatar')){
                    $fileName = $request->avatar->getClientOriginalName();
                    $newName = time() . "-" . $fileName;
                    $request->avatar->move(public_path('/img/tour'), $newName);
                    $photoUrl = url('/img/tour/'.$newName);
                }
                $room->avatar = $photoUrl;
                $room->save();
        return back()->with(['updateSuccess' => 'Номер был успешно обновлен']);

            }

            $room->update($request->all());
        return back()->with(['updateSuccess' => 'Номер был успешно обновлен']);
    }

    public function review_get($id){
        $review = Review::find($id);
        if(ReviewImage::where('revew_id',$id)->first()){
            $review_images = ReviewImage::where('revew_id',$id)->get();
        }
        else{
            $review_images = null;
        }
       
        $user = User::where("id", $review->user_id)->first();
        return view('tour.review.review', ['review'=>$review, "review_images"=>$review_images, 'user'=>$user]);
    }

    public function review_delete(Request $request, $id){
        $review = Review::find($id);
        $review->delete();
        return redirect((session('tour_link')))->with(['DeleteSuccess'=>'Комментарий был успешно удален']);
    }

    public function room_delete($id){
        $room = Room::find($id);
        $room->delete();
        return redirect(route('room.all'));
    }
}
