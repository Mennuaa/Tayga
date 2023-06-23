<?php

<<<<<<< HEAD
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Auth;
=======
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
>>>>>>> aa3445f (projects done)
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

<<<<<<< HEAD
Route::get('/', function () {
    if(Auth::check()){
        $user = Auth::user();
        if($user->role_id == 2){
            return redirect(route('manager.home'));
        }else if($user->role_id == 3){
            return redirect(route('studios.home'));
        }
    }
    return view('containers.auth.signin');
});

# Auth

Route::get('/auth/signin', [PagesController::class, 'signin'])->name('signin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

# Sign in

Route::post('/auth/signin', [SignInController::class, 'signin'])->name('signin');

# Manager

Route::get('/dashboard', [PagesController::class, 'Dashboard'])->name('dashboard');
Route::get('/manager/requests', [PagesController::class, 'ManagerRequests'])->name('manager.home')->middleware('eurogroup');

# Studios

Route::get('/studios/dashboard', [PagesController::class, 'StudiosRequest'])->middleware('studio')->name('studios.home');

# Update Profile

Route::put('/user/{id}', [UserController::class, 'resetProfile'])->name('reset_profile');
Route::put('/user/studio/{id}', [UserController::class, 'resetStudioProfile'])->name('reset_studi_profile');

//livewire routes

Route::get('/users',CreateChat::class)->name('users');
Route::get('/chat{key?}',Main::class)->name('chat');


=======
	# for admin panel
Route::group(['middleware' => 'auth'], function () {
	#user

    Route::get('/', [HomeController::class, 'home']);
	Route::get('/admin/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('/admin/profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('/admin/user-management', function () {
		$users = User::all();
		return view('laravel-examples/user-management', ['users'=>$users]);
	})->name('user-management');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');
    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::resources([

		'/user'=> UserController::class,
		'/user/create'=> UserController::class,
	]);
	Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit_user');
	Route::get('/user/update/{id}', [UserController::class, 'update'])->name('update_user');
	Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('delete_user');

	#tours 

	Route::get('/tour/all', [TourController::class, 'all'])->name('tour.all');
	Route::get('/tour/add', [TourController::class, 'addTour'])->name('tour.add.view');
	Route::get('/tour/edit/{id}', [TourController::class, 'editTour'])->name('tour.edit.view');
	Route::post('/tour/edit/{id}', [TourController::class, 'updateTour'])->name('tour.edit');
	Route::post('/tour/add', [TourController::class, 'add'])->name('tour.add');
	Route::delete('/tour_image/delete/{id}', [TourController::class, 'delete_image'])->name('tour.image.delete');
	Route::post('/tour_image/add', [TourController::class, "add_image"])->name('tour.image.add');

	Route::get('/tour/{id}', [TourController::class, 'get_tour'])->name('tour.get');


	# rooms 

	Route::get('/rooms', [TourController::class, 'rooms'])->name('room.all');
	Route::get('/room/add', [TourController::class, 'addRoom'])->name('room.add.view');
	Route::post('/room/add', [TourController::class, 'storeRoom'])->name('room.add');
	Route::get('/room/{id}', [TourController::class, 'room'])->name('room');
	Route::post('/add_room/{id}', [ TourController::class , 'add_room_method'])->name('add.room.tour');
	Route::delete('/tour_room/delete/{id}', [TourController::class, 'delete_tour_room'])->name('delete.tour_room');
	Route::post('room/edit/{id}', [TourController::class, 'room_edit'])->name('room.edit');
	Route::delete('room/delete/{id}', [TourController::class, 'room_delete'])->name('room.edit');

	#  reviews

	Route::get('/review/{id}', [TourController::class, 'review_get'])->name('review.get');
	Route::delete('/review/delete/{id}', [TourController::class, 'review_delete'])->name('review.delete');
	
	#  news

	Route::get('/news', [NewsController::class, "all"])->name('news.all');
	Route::get('/news/add', [NewsController::class, "add"])->name('news.add');
	Route::post('/news/add', [NewsController::class, "create"])->name('news.create');
	Route::get('/news/{id}', [NewsController::class, "edit"])->name('news.edit');
	Route::put('/news/{id}', [NewsController::class, "update"])->name('news.update');
	Route::delete('/news/{id}', [NewsController::class, "delete"])->name('news.update');

	# contact us

	Route::get('/contact_us', [UserController::class, 'contact_as_all'])->name('contact_us.all');
	Route::get('/contact_us/{id}', [UserController::class, 'contact_as'])->name('contact_us');
	Route::delete('/contact_us/{id}', [UserController::class, 'contact_us_delete'])->name('contact_as.delete');
});



	
Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/admin/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/admin/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/admin/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});
>>>>>>> aa3445f (projects done)
