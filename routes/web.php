<?php

use App\Events\UserConnectedToRoom;
use App\Http\Controllers\ResetPasswordController;
use App\Models\Room;
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

Route::get('reset-password/{token}', [ResetPasswordController::class, 'checkToken'])->name('pwd-reset');
Route::post('store-password/', [ResetPasswordController::class, 'updateUser'])->name('newpassword');
