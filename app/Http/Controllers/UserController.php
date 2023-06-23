<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\StudioUsers;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function resetProfile(Request $request, $id){
        // dd($request->all());
        $user = User::find($id);
        if($request->has('prev_password') && $request->prev_password !== null){
            if(Hash::check($request->prev_password, Auth::user()->password)){
                if($request->password === $request->re_password){
                    $user->password = Hash::make($request->password);
                }else if($request->password !== $request->re_password){
                    return back()->with('notCorrectRePass', 'write correct password confirmation');
                }
            }else{
                return back()->with('notCorrectPrevPass', "Previous password is not correct");
            }
        }
        $user->name = $request->name;
    //     if($request->email !== $user->email){
    //         $email = User::where('email',$request->email)->first();
    //         if($email != null){
    //          return back()->with('emailExist', 'User with exact email exist');
    //         }else{
                
    //     $user->email = $request->email;
    // }
    //     }
    if($request->has('address') || $request->has('working_time')|| $request->has('studio_name') ){
       $studio_user = StudioUsers::where('user_id', $user->id)->first();
       $studio_user->address = $request->address;
       $studio_user->working_time = $request->working_time;
       $studio_user->studio_name = $request->studio_name;
       $studio_user->save();
    }
        $image = $user->image;
        if($request->has('image')){
            $fileName = $request->file('image')->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $request->file('image')->move(public_path('/img/user'), $newName);
            $image = url('/img/user/'.$newName);
        }
        // $user->email = $request->email;
        $user->phone = $request->phone;
        $user->image = $image;
        $user->update();
        return back()->with('profileChangeSuccess', 'Profile has been updated successfully');
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect(route('signin'));
=======
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            
            return back()->with(["validatorFailed" => "Введите корректные данные пользователя"]);
        }
        $photoUrl = '';
        if($request->file('avatar')){
         $fileName = $request->file('avatar')->getClientOriginalName();
            $newName = time() . "-" . $fileName;
            $request->file('avatar')->move(public_path('/img/user'), $newName);
            $photoUrl = url('/img/user/'.$newName);
        }
        $input = [
                "email" => $request->email,
                "name" => $request->name,
                "phone" => (int)$request->phone,
                "avatar" => $photoUrl,
                "password" => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ];
        
        if(User::where('email', $request->email)->first()){
            
            return back();
        }

        $user = User::create($input);
        if($user) {
        Auth::login($user);
       
        return redirect('/admin/user-management')->with(["message" => "Пользователь создан успешно"]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('update_user', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
       $user = User::find($id);
       $user->update($request->all());
       return back()->with(['updateSuccess' => "Пользователь был успешно изменен"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('user-management'))->with(['deleteSuccess' => "Пользователь был успешно удален"]);
    }

    public function contact_as_all(){
        $contact_as_all = ContactUs::orderBy('created_at', 'desc')->get();
        return view('contact_us.contact_us_all', ['contact_as_all'=>$contact_as_all]);
    }

    public function contact_as($id){
        $contact_as = ContactUs::find($id);
        return view('contact_us.contact_us', ['contact_us'=>$contact_as]);
    }
    public function contact_us_delete($id) {
        $contact_as = ContactUs::find($id);
        $contact_as->delete();
        return redirect(route('contact_us.all'));
>>>>>>> aa3445f (projects done)
    }
}
