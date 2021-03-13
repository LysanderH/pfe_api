<?php

use App\Http\Controllers\ApiExercisesController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiRegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExerciseController;
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

Route::get('/', function () {
    return ['hello' => 'world'];
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get(
        '/me',
        function () {
            return auth()->user();
        }
    );
    Route::post('/auth/logout', [ApiLoginController::class, 'logout']);
});

Route::post('/auth/login', [ApiLoginController::class, 'login'])->name('login');
Route::post('/auth/register', [ApiRegisterController::class, 'register'])->name('register');
Route::resource('exercises', ExerciseController::class);
Route::resource('courses', CourseController::class);
