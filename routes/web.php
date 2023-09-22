<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OrderlineController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationDetailController;
use App\Http\Livewire\MovieLivewire;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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





// Route::get("/product", [ProductController::class, "index"])->name('product.index');
// Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
// Route::post("/product", [ProductController::class, "store"])->name('product.store');
// Route::get('/product/{id}', [ProductController::class, "show"])->name('product.show');
// Route::get("/product/{id}/edit", [ProductController::class, "edit"])->name('product.edit');
// Route::patch("/product/{id}", [ProductController::class, "update"])->name('product.update');
// Route::delete("/product/{id}", [ProductController::class, "destroy"])->name('product.destroy');

Route::resource('/product', ProductController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// use Socialite;

Route::get('/auth/{provider}/redirect', function ($provider) {
    return Socialite::driver($provider)->redirect();
});

Route::get('/auth/{provider}/callback', function ($provider) {
    $providerUser = Socialite::driver($provider)->user();
    // $user->token
    switch ($provider) {
        case "google":
            // $user = User::where('provider_id', $providerUser->id)->first();
            $user = User::where('email', $providerUser->email)->first();

            if ($user) {
                $user->update([
                    // 'provider_token' => $providerUser->token,
                    // 'provider_refresh_token' => $providerUser->refreshToken,
                ]);
            } else {
                $user = User::create([
                    'name' => $providerUser->name,
                    'email' => $providerUser->email,
                    'password' => Hash::make(Str::random(16)),
                    // 'provider_id' => $providerUser->id,
                    // 'provider_token' => $providerUser->token,
                    // 'provider_refresh_token' => $providerUser->refreshToken,
                ]);
            }

            // Auth::login($user);
            Auth::login($user, $remember = true);

            break;
    }


    return redirect('/dashboard');
});

// Route::resource('post', 'PostController');
Route::resource('post', PostController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::get('customer2', [CustomerController::class, 'index2']);
    Route::get('quotation/{id}/pdf', [QuotationController::class, 'pdf']);
    Route::resource('quotation', QuotationController::class);
    Route::resource('quotation-detail', QuotationDetailController::class);
});


Route::get('/test/pdf', function () {
    $a = "hello";
    $b = "world";
    $c = "วันจันทร์";
    $pdf = Pdf::loadView('testpdf', compact('a', 'b', 'c'));
    return $pdf->stream();
});

Route::get('test/bootstrap/pdf', function () {
    $pdf = Pdf::loadView('test-bootstrap-pdf');
    return $pdf->stream();
});


// Route::resource('leave-request', 'LeaveRequestController');
// Route::resource('leave-type', 'LeaveTypeController');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin,guest'])->group(function () {
        Route::resource('leave-request', LeaveRequestController::class)->except(['edit', 'update']);
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('leave-request', LeaveRequestController::class)->only(['edit', 'update']);
        Route::resource('leave-type', LeaveTypeController::class);
        Route::get("dashboard-leave", function () {
            return view("dashboard-leave");
        });
    });
});


Route::get("counter", function () {
    return view("counter");
});


// Route::resource('movie', 'MovieController');
// Route::resource('category', 'CategoryController');
Route::resource('movie', MovieController::class);
Route::resource('category', CategoryController::class);

Route::get("movie-livewire", function () {
    return view("movie-livewire");
});

Route::get('movie2', function (Request $request) {
    return $request->get('category_id');
});
