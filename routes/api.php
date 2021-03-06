<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function (Request $request) {

    //dd($request->headers->all());
    //dd($request->headers->get('authorization'));

    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Minha primeira resposta de API']));
    $response->header('Content-Type', 'application/json');
    return $response;
});

//Products Route
//Route::get('/products', function(){
//return \App\Product::all();
//});

Route::namespace('Api')->group(function(){
    //Products Route
    route::prefix('products')->group(function(){
        Route::get('/', 'ProductController@index');
        Route::get('/{id}', 'ProductController@show');
        //Route::post('/','ProductController@save')->middleware('auth.basic');
       Route::post('/','ProductController@save');
        Route::put('/','ProductController@update');
        Route::patch('/','ProductController@update');
        Route::delete('/{id}', 'ProductController@delete');
    });

    Route::resource('/users', 'UserController');
});


