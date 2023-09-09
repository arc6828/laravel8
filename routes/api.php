<?php

use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sanctum/token',  function (Request $request) {

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        // throw ValidationException::withMessages(
        return [
            'email' => ['The provided credentials are incorrect.'],
        ];
        // );
    }

    return ['token' => $user->createToken($request->device_name)->plainTextToken];
});

Route::get('quotation',function(){
    $quotations = Quotation::withSum('quotationDetails', 'total')->get();
    return $quotations; 
});

Route::get('user',function(){
    $users = User::select('id','name','email')->withCount('quotations')->get();
    return $users; 
});


