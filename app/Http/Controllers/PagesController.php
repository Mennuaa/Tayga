<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Events\MessageEvent;
use App\Http\Middleware\StudioManager;
use App\Models\StudiosManager;
use App\Models\StudioUsers;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    # Sign In
    
    public function signin(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role_id == 2){
                return redirect(route('manager.home'));
            }else if($user->role_id == 3){
                return redirect(route('studios.home'));
            }
        }
            return view('containers.auth.signin');
    }

    # Manager 

    public function Dashboard(){
        $user = Auth::user();
        $role = UserRoles::where('id', $user->role_id)->first()->name;
        if($user->role_id == 3){
            $studio_user = StudioUsers::where('user_id', $user->id)->first();
            return view('containers.dashboard', compact('user', 'role', 'studio_user'));
        }
        return view('containers.dashboard', compact('user', 'role'));
    }

    public function ManagerRequests(){
        $user = auth()->user();
        return view('containers.manager.manager-request', ['user'=>$user]);
    }

    # Studios

    public function StudiosRequest(){
        $user = auth()->user();
        $manager = StudiosManager::where('studio_id', $user->id)->first();
        $manager = User::where('id', $manager->manager_id)->first();
        return view('containers.studio.studios-requests', ['user'=> $user, 'manager'=>$manager]);
    }


    public function chat(){

        return view('containers.chat');
    }

    public function chat_list(){
        $user = auth()->user();
        if($user->role_id == 2){
            return view('containers.studio.chat-list', ['user'=> $user]);
        }else if($user->role_id == 3){
            $manager = StudiosManager::where('studio_id', $user->id)->first();
            $manager = User::where('id', $manager->manager_id)->first();
            return view('containers.studio.chat-list', ['user'=> $user, 'manager'=>$manager]);
        }
      
    }
=======
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
>>>>>>> aa3445f (projects done)
}
