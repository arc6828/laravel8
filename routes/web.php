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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get("/teacher", function () {
        return view("teacher");
    });
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
Route::get("/myprofile/{id}", [MyProfileController::class, "show"]);

Route::get("/newgallery", [MyProfileController::class, "gallery"]);
Route::get("/newgallery/ant", [MyProfileController::class, "ant"]);

Route::get("/coronavirus", [MyProfileController::class, "coronavirus"]);

use App\Http\Controllers\Covid19Controller;

Route::resource('/covid19', Covid19Controller::class);

// Route::get("/covid19/create",[ Covid19Controller::class , "create" ]);
// Route::get("/covid19/{id}/edit", [ Covid19Controller::class , "edit" ]);
// Route::get('/covid19', [ Covid19Controller::class,"index" ]);
// Route::get('/covid19/{id}',[ Covid19Controller::class,'show' ]);
// Route::post("/covid19",[ Covid19Controller::class , "store" ]);
// Route::patch("/covid19/{id}", [ Covid19Controller::class , "update" ]);
// Route::delete('/covid19/{id}', [ Covid19Controller::class , 'destroy' ]);


use App\Http\Controllers\StaffController;

Route::resource('/staff', StaffController::class);

// Route::resource('post', 'PostController'); //ยกเลิกการใช้งานเพราะเป็นวิธีการ v.6 / v.7
use App\Http\Controllers\PostController;  //เขียนเพิ่ม
Route::resource('post', PostController::class); //แก้ไขเพิ่ม


// Route::resource('profile', 'ProfileController');
// Route::resource('user', 'UserController');
// Route::resource('vehicle', 'VehicleController');

use App\Http\Controllers\ProfileController;  //เขียนเพิ่ม
use App\Http\Controllers\UserController;  //เขียนเพิ่ม
use App\Http\Controllers\VehicleController;  //เขียนเพิ่ม

Route::resource('profile', ProfileController::class);
Route::resource('user', UserController::class);
Route::resource('vehicle', VehicleController::class);

// Route::resource('order', 'OrderController');
// Route::resource('payment', 'PaymentController');
// Route::resource('order-product', 'OrderProductController');
// Route::resource('product', 'ProductController');

use App\Http\Controllers\OrderController;  //เขียนเพิ่ม
use App\Http\Controllers\PaymentController;  //เขียนเพิ่ม
use App\Http\Controllers\OrderProductController;  //เขียนเพิ่ม
use App\Http\Controllers\ProductController;  //เขียนเพิ่ม

Route::middleware(['auth'])->group(function () {
    Route::resource('order', OrderController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('order-product', OrderProductController::class);
});
Route::get('/product/pdf', [ ProductController::class , 'pdf_index' ] );
Route::resource('product', ProductController::class);

