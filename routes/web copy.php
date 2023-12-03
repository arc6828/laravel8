<?php

use App\Http\Controllers\ProductController;
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





// Route::get("/product", [ProductController::class, "index"])->name('product.index');
// Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
// Route::post("/product", [ProductController::class, "store"])->name('product.store');
// Route::get('/product/{id}', [ProductController::class, "show"])->name('product.show');
// Route::get("/product/{id}/edit", [ProductController::class, "edit"])->name('product.edit');
// Route::patch("/product/{id}", [ProductController::class, "update"])->name('product.update');
// Route::delete("/product/{id}", [ProductController::class, "destroy"])->name('product.destroy');

Route::resource('/product', ProductController::class );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('greeting', ['name' => 'Finn']);
});

use App\Models\Task;
 
Route::get('/tasks', function () {
    // return view('tasks', ['tasks' => Task::all()]);
});
?>
Hello, {{ $name }}.

<!-- resources/views/components/layout.blade.php -->
 
<html>
    <head>
        <title>{{ $title ?? 'Todo Manager' }}</title>
    </head>
    <body>
        <h1>Todos</h1>
        <hr/>
        {{ $slot }}
    </body>
</html>

<!-- resources/views/tasks.blade.php -->
 
<x-layout>
    <x-slot name="title">
        Custom Title
    </x-slot>
    @foreach ($tasks as $task)
        {{ $task }}
    @endforeach
</x-layout>


<!-- resources/views/layouts/app.blade.php --> 
<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <h1>@yield('title')</h1>
        <hr/>
        @yield('content')
    </body>
</html>

<!-- resources/views/tasks.blade.php -->
 
@extends('layouts.app')
 
@section('title', 'Page Title')

@section('content')
    @foreach ($tasks as $task)
        {{ $task }}
    @endforeach
@endsection