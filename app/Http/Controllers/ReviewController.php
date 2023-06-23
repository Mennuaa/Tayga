<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\ReviewImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function create(Request $request){
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'tour_id' => 'required',
            'review' => 'required',
            'date' => 'required',
        ]);
        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input = [
            "tour_id" => $request->tour_id,
            "user_id" => $user->id,
            "stars" => $request->stars,
            "date" => $request->date,
            "revew" => $request->review,
            "placement_stars" => $request->placement_stars,
            "service_stars" => $request->service_stars,
            "eat_stars" => $request->eat_stars,

        ];

        $created_review = Review::create($input);
        $photoUrl = '';
        $created_image = [];
        for ($i=1; $i <= 8; $i++) { 
            $image = "image" . $i;
            if(request($image) ){
                $fileName = request($image)->getClientOriginalName();
                $newName = time() . "-" . $fileName;
                request($image)->move(public_path('/img/tour'), $newName);
                $photoUrl = url('/img/tour/'.$newName);
                $input_image = [
                    "revew_id" =>$created_review->id,
                    "image" => $photoUrl
                ];
                ReviewImage::create($input_image);
            }
        }
        if($created_review){
            $response = [
                "status" => true,
                "message" => "Комментарий был успешно добавлен",
                "comment" => ReviewResource::make($created_review)
            ];
            return response($response, 200);
        }
        return response([
            "status" => false,
                "message" => "Комментарий не был отправлен",
        ], 400);
    }
}
