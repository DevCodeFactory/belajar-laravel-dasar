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

Route::get('/dcs', function () {
    return 'Hello DevCode Factory';
});

Route::redirect('/youtube', '/dcs');

Route::fallback(function () {
    return '404 By DevCode Factory';
});

Route::view('/hello', 'hello', ['name' => 'Fahmi']);

Route::get('/hello-again', function () {
    return view('hello', ['name' => 'Fahmi']);
});

Route::view('/hello-world', 'hello.world', ['name' => 'Fahmi']);

Route::get('/products/{id}', function ($productId) {
    return "Product $productId";
});

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
});

Route::get('/categories/{id}', function ($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+');

Route::get('/users/{id?}', function ($userId = '404') {
    return "User $userId";
});

Route::get('/conflict/fahmi', function () {
    return "Conflict Azdy Fahmi";
});

Route::get('/conflict/{name}', function ($name) {
    return "Conflict $name";
});
