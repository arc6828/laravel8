<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/react', function () {
    return view('react');
});

Route::get("/homepage", function () {
    return "<h1>This is home page</h1>";
});

Route::get("/blog/{id}", function ($id) {
    return "<h1>This is blog page : {$id}55555 </h1>";
});

Route::get("/blog/{id}/edit", function ($id) {
    return "<h1>This is blog page : {$id} for edit</h1>";
});

Route::get("/product/{a}/{b}/{c}", function ($a, $b, $c) {
    return "<h1>This is product page </h1><div>{$a} , {$b}, {$c}</div>";
});

Route::get("/category/{a?}", function ($a = "mobile") {
    return "<h1>This is category page : {$a} </h1>";
});

Route::get("/myorder/create", function () {
    return "<h1>This is order form " . request("id") . " page : " . request("username") . "</h1>";
});

Route::get("/hello", function () {
    return view("hello");
});

Route::get('/greeting', function () {
    $name = 'James';
    $last_name = 'Mars';
    return view('greeting', compact('name', 'last_name'));
});

Route::get("/gallery", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://amp.insider.com/images/5b7acee73cccd122008b45ac-750-563.jpg";
    $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg";

    return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
});

Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    
    return view("test/ant", compact("ant"));
});


Route::get("/teacher", function () {
    return view("teacher");
});

Route::get("/student", function () {
    return view("student");
});

Route::get('/table', function () {
    return view('table');
});

use App\Http\Controllers\MyProfileController;

Route::get("/myprofile/create", [MyProfileController::class, "create"]);
Route::get("/myprofile/{id}/edit", [MyProfileController::class, "edit"]);
Route::get("/myprofile/{id}", [ MyProfileController::class , "show" ]);

Route::get( "/newgallery" , [ MyProfileController::class , "gallery" ] );
Route::get( "/newgallery/ant" , [ MyProfileController::class , "ant" ] );

Route::get( "/coronavirus" , [ MyProfileController::class , "coronavirus" ] );

use App\Http\Controllers\Covid19Controller;

Route::get("/covid19/create",[ Covid19Controller::class , "create" ]);
Route::get("/covid19/{id}/edit", [ Covid19Controller::class , "edit" ]);
Route::get('/covid19', [ Covid19Controller::class,"index" ]);
Route::get('/covid19/{id}',[ Covid19Controller::class,'show' ]);
Route::post("/covid19",[ Covid19Controller::class , "store" ]);
Route::patch("/covid19/{id}", [ Covid19Controller::class , "update" ]);