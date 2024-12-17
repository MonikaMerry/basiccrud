<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get(uri: 'view-data',action: [UserController::class,'viewPage']);

Route::post(uri: 'post-data',action: [UserController::class,'createData']);

Route::get(uri: 'edit-data/{id}',action: [UserController::class,'editForm']);

Route::post(uri: 'update-data',action: [UserController::class,'updateForm']);

Route::get(uri: 'delete-data/{id}',action: [UserController::class,'deleteForm']);



