<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('registration', 'AuthController@registration');

});
Route::group(['namespace' => 'App\Http\Controllers\Post', 'middleware' => 'jwt.auth'], function () {
    Route::post('/posts/create', 'CreateController');
    Route::delete('/posts/{post}', 'DeleteController');
    Route::get('/posts', 'IndexController');
    Route::patch('/posts/{post}', 'UpdateController');
});

Route::group(['namespace' => 'App\Http\Controllers\Chat', 'middleware' => 'jwt.auth'], function () {
    Route::post('/chats/create', 'CreateController');
    Route::delete('/chats/{chat}', 'DeleteController');
    Route::get('/chats', 'IndexController');
    Route::patch('/chats/{chat}', 'UpdateController');
});

Route::group(['namespace' => 'App\Http\Controllers\Friend', 'middleware' => 'jwt.auth'], function () {
    Route::post('/friend/create', 'CreateController');
    Route::delete('/friend/{friend}', 'DeleteController');
    Route::get('/friend', 'IndexController');

});

Route::group(['namespace' => 'App\Http\Controllers\Message', 'middleware' => 'jwt.auth'], function () {
    Route::post('chats/{chat}', 'CreateController');
    Route::delete('chats/messages/delete', 'DeleteController');
    Route::get('chats/{chat}', 'IndexController');
    Route::patch('chats/messages/update', 'UpdateController');
});
