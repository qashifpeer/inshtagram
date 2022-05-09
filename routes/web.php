<?php

use App\Http\Controllers\FollowersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('profile', ProfilesController::class)->parameters(['profile'=>'user']);
Route::get('profile/{user}', [ProfilesController::class,'index']);

Route::get('/', [PostsController::class,'index'])->middleware(['auth']);
Route::resource('p', PostsController::class)->parameters(['p'=>'post'])->middleware(['auth']);
Route::post('follow/{user}',[FollowersController::class,'store'])->middleware(['auth']);

require __DIR__.'/auth.php';
