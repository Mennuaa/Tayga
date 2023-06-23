<?php

<<<<<<< HEAD
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CollectionController;
use App\Http\Controllers\API\BoxController;
use App\Http\Controllers\API\FilmController;
use App\Http\Controllers\API\StudiosEurogroupManagersController;
use App\Http\Controllers\API\WishListController;
=======
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\TourController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ReviewController;
>>>>>>> aa3445f (projects done)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
<<<<<<< HEAD
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
=======
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
>>>>>>> aa3445f (projects done)
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD

# Auth

Route::post('/auth/signup', [AuthController::class, 'signUp'])->name('signup.api');
Route::post('/auth/signin', [AuthController::class, 'signIn'])->name('signin.api');

# User

# get user
Route::get('/user/{id}', [UserController::class, "getUser"])
->middleware('auth:sanctum')
->name('getUser');

# change user
Route::put('/user/{id}', [UserController::class, "updateProfile"])
->middleware('auth:sanctum')
->name('updateUser');

# change password

Route::put('/user/changepass/{id}', [UserController::class, "changePassword"])
->middleware('auth:sanctum')
->name('changePassword');




Route::resources([

    # Collections 

    '/collections' => CollectionController::class,
    '/collections/create' => CollectionController::class,

    # Boxes

    '/box' => BoxController::class,
    '/box/create' => BoxController::class,

    # Films

    '/film' => FilmController::class,
    '/film/create' => FilmController::class,
]);

# Wishlist

# get wishlist

Route::get('/wishlist', [WishListController::class, 'get'])
->name('getWishlist')
->middleware('auth:sanctum');

# add to wishlist

Route::post('/wishlist/add', [WishListController::class, 'add'])
->name('addToWishlist')
->middleware('auth:sanctum');

Route::post('/add-manager/{id}', [StudiosEurogroupManagersController::class, 'studioManagers'])->middleware('auth:sanctum')->name('addManager');


=======
Route::post('/signup', [AuthController::class, 'signUp'])->name('api.signup');
Route::post('/signin', [AuthController::class, 'signIn'])->name('api.signin');
Route::post('/add_room_tour',[ TourController::class, 'add_room_tour'])->name('add_room_tour_api');
#add review

Route::group(['middleware' => 'auth:sanctum'], function(){
Route::post('/review', [ReviewController::class, "create"])->name('api.review.create');
Route::put('/review/{id}', [TourController::class, 'edit_review'])->name('api.review.edit');
Route::delete('/review/{id}', [TourController::class, 'delete_review'])->name('api.review.edit');

# tour

Route::get('tour/{id}', [TourController::class, 'get'])->name('api.tour.get');
Route::get(('tours'), [TourController::class, 'all'])->name('api.tour.all');

# room

Route::get('/room/{id}', [TourController::class, 'get_room'])->name('api.room.get');
Route::get('/rooms', [TourController::class, 'all_room'])->name('api.room.all');

Route::put('/user' , [UserController::class, 'edit'])->name('api.user.edit');

Route::get('/news', [NewsController::class, 'all'])->name('api.news.all');
Route::get('/news/{id}', [NewsController::class, 'get'])->name('api.news.get');

Route::post('/filter', [TourController::class, 'filter'])->name('api.tour.filter');

# contact us

Route::post('/contact_us', [UserController::class, 'send_message'])->name('api.contact_us');
});
>>>>>>> aa3445f (projects done)
