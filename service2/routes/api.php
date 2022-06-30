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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post("/student", "App\Http\Controllers\EventController@getByName");
Route::get("/student", "App\Http\Controllers\StudentController@getByMaSV");
// Route::get("/student/", "App\Http\Controllers\StudentController@index");
Route::resource("/students", "App\Http\Controllers\StudentController");
Route::resource("/transcript", "App\Http\Controllers\TrancriptsController");