<?php

use App\Http\Controllers\ApiExercisesController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiRegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TacticController;
use App\Http\Controllers\UpdateUser;
use App\Http\Controllers\VideoConference;
use App\Models\Course;
use App\Models\User;
use Illuminate\Validation\ValidationException;
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

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/auth/logout', [ApiLoginController::class, 'logout']);
    Route::resource('exercises', ExerciseController::class);
    // Route::post('exercises', [ExerciseController::class, 'store']);
    Route::resource('groups', GroupController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('tactics', TacticController::class);
    Route::get('/rooms/connect/{id}', [RoomController::class, 'connect']);
    Route::put('users/{id}', [UpdateUser::class, 'update']);
    Route::get('video-conference', [VideoConference::class, 'information']);
    // Route::get('start-conference', function (Request $request) {
    //     $courses = User::with('groups', 'courses')->where('id', $request->user()->id)->get();
    //     return response()->json(['courses' => $courses]);
    // });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('sanctum/register', [ApiRegisterController::class, 'register']);

Route::post('sanctum/login', [ApiLoginController::class, 'login']);
