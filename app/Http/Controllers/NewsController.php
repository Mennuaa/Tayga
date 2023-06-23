<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function all(){
        $news = News::all();
        return view('news.news', ["news"=>$news]);
    }

    public function add(Request $request){
        return view('news.add_news', ['request'=>$request]);
    }

    public function create(Request $request){
        $photoUrl = '';
        if($request->has('avatar')){
            $fileName = $request->avatar->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $request->avatar->move(public_path('/img/news'), $newName);
            $photoUrl = url('/img/news/'.$newName);
        }

        $input = [
            "name" => $request->name,
            "text" => $request->text,
            "date" => $request->date,
            "image" => $photoUrl,
        ];

        $news = News::create($input);
        if($news){
            return redirect(route('news.all'))->with(['createdSuccess'=> 'Номер был успешно добавлен']);
        }else{
            return back()->withInput($request->only('name', 'text','date'))->with(['couldntCreate'=> 'Убедитесь что все данные правильны']);
        }
    }

    public function edit($id){
        $news = News::find($id);
        return view('news.edit_news', ["news"=>$news]);
    }
    public function update(Request $request, $id){
        $news = News::find($id);
        if($request->has('avatar')){
            $photoUrl = '';
            if($request->has('avatar')){
                $fileName = $request->avatar->getClientOriginalName();
                $newName = time() . "-" . $fileName;
                $request->avatar->move(public_path('/img/news'), $newName);
                $photoUrl = url('/img/news/'.$newName);
            } 
            $news->image = $photoUrl;
            $news->save();
        return back()->with(['updateSuccess' => 'Новость был успешно обновлен']);
        }
        $news->update($request->all());
        return back()->with(['updateSuccess' => 'Новость был успешно обновлен']);
    }
    public function delete($id){
        $room = News::find($id);
        $room->delete();
        return redirect(route('news.all'));
    }
}
