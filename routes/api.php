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
});\

//API Authentification

Route::post('/user/register', [App\Http\Controllers\Api\AuthController::class, 'register']);

Route::post('/user/login', [App\Http\Controllers\Api\AuthController::class, 'login']);


//API Tags

Route::post('/tag/index', [App\Http\Controllers\Api\TagsController::class, 'index']);

Route::post('/tag/store', [App\Http\Controllers\Api\TagsController::class, 'store']);

Route::get('/tag/show/{tags}', [App\Http\Controllers\Api\TagsController::class, 'show']);

Route::patch('/tag/update/{tags}', [App\Http\Controllers\Api\TagsController::class, 'update']);

Route::delete('/tag/destroy/{tags}', [App\Http\Controllers\Api\TagsController::class, 'destroy']);

//API Problems
Route::post('/problems/index', [App\Http\Controllers\Api\ProblemsController::class, 'index']);

Route::post('/problems/store', [App\Http\Controllers\Api\ProblemsController::class, 'store']);

Route::get('/problems/show/{problems}', [App\Http\Controllers\Api\ProblemsController::class, 'show']);

Route::patch('/problems/update/{problems}', [App\Http\Controllers\Api\ProblemsController::class, 'update']);

Route::delete('/problems/destroy/{problems}', [App\Http\Controllers\Api\ProblemsController::class, 'destroy']);

Route::get('/problems/search/{problems}', [App\Http\Controllers\Api\ProblemsController::class, 'search']);
