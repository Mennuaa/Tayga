<?php

namespace App\Http\Resources;

use App\Models\Review;
use App\Models\Room;
use App\Models\TourImage;
use App\Models\TourRooms;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $tour_rooms = [];
        $rooms = TourRooms::where('tour_id', $this->id)->get();
        $all_rooms = Room::all();
        foreach($all_rooms as $room){
            foreach($rooms as $tour_room){
               if($room->id == $tour_room->room_id){
               array_push($tour_rooms, $room);
               }
            }
        }
        $images = TourImagesResource::collection(TourImage::where("tour_id", $this->id)->get());
        $reviews = ReviewResource::collection(Review::where('tour_id', $this->id)->get());
        return [
            "id" => $this->id,
            "name" => $this->name,
            "date" => $this->date,
            "days" => $this->days,
            "subtitle" => $this->subtitle,
            "text" => $this->text,
            "tour_advantages" => $this->tour_advantages,
            "price" => $this->price,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
            "place_name" => $this->place_name,
            "tour_privilages" => $this->tour_privilages,
            "stars" => $this->stars,
            "placement_stars" => $this->placement_stars,
            "service_stars" => $this->service_stars,
            "eating_stars" => $this->eating_stars,
            "images" => $images,
            "rooms" => RoomResource::collection($tour_rooms),
            "rooms_count" => count($tour_rooms),
            "reviews" => $reviews,
            "reviews_count" => count($reviews),
        ];
    }
}
