<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\ViewController;
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

Route::post('/login' , [AuthController::class , 'login']);
Route::post('/register' , [AuthController::class , 'register']);
Route::get('/users/{user}' , [UserController::class , 'show']);
Route::get('/usersInformation' , [UserInformationController::class , 'index']);
Route::get('/usersInformation/{userInformation}' , [UserInformationController::class , 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout' , [AuthController::class , 'logout']);
    Route::post('/usersInformation' , [UserInformationController::class , 'store']);
    Route::post('/userInformation/update' , [UserInformationController::class , 'update']);
    Route::delete('/userInformation/{userInformation}' , [UserInformationController::class , 'destroy']);
    Route::get('/users' , [UserController::class , 'index']);
    Route::post('/users' , [UserController::class , 'store']);
    Route::get('/profile' , [UserController::class , 'profile']);
    Route::patch('/users/{user}' , [UserController::class , 'resetPassword']);
    Route::delete('/users/{user}' , [UserController::class , 'destroy']);
    Route::get('/is_have_record' , [UserInformationController::class , 'hasRecord']);

    /////Template

    Route::get('/templates',[TemplateController::class,'index']);
    Route::post('/templates',[TemplateController::class,'store']);
    Route::patch('/templates/{template}',[TemplateController::class,'update']);
    Route::get('/templates/{template}',[TemplateController::class,'show']);
    Route::delete('/templates/{template}',[TemplateController::class,'destroy']);

    ///// Social Media
    Route::get('/social', [SocialMediaController::class, 'index']);
    Route::post('/social', [SocialMediaController::class, 'store']);
    Route::patch('/social', [SocialMediaController::class, 'update']);
    Route::delete('/social/{social}', [SocialMediaController::class, 'delete']);

    ///// Views
    Route::post('/views', [ViewController::class, 'store']);
    Route::get('/views', [ViewController::class, 'viewc']);
});


