<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function all(){
        $news = News::all();
        $response = [
            "status" => true,
            "news" => NewsResource::collection($news)
        ];
        return  response($response , 200);
    }
    public function get($id){
        $news = News::find($id);
        if(!$news){
            $response = [
                "status" => false,
                "message" => "Новость не найден"
            ];
            return  response($response , 400);
        }
        $response = [
            "status" => true,
            "news" => NewsResource::make($news)
        ];
        return  response($response , 200);
    }
}
