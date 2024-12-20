<?php

use App\Http\Controllers\API\CoursesController;
use App\Http\Controllers\API\UserCourseController;
use App\Http\Controllers\API\UsersController;
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

Route::apiResource('users', UsersController::class);
Route::apiResource('courses', CoursesController::class);
Route::apiResource('usercourses', UserCourseController::class);
