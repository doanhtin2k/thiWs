<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Events\SuccessEvent;
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
    return Inertia::render('Home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::resource('/task', "App\Http\Controllers\TaskController");

// Route::get("/send-message", function() {
//     for($i=0;$i<5;$i++)
//     {
//         event(new App\Events\DemoEvent("doanhad ". $i));
//         // sleep(5);
//     }
//     dd(1);
// });
Route::get('/sendmail', function () {
    event(new SuccessEvent("doanh adddd", "doanhnd@rabiloo.com"));
    dd(2);
});