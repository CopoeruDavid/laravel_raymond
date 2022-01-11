<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ImageController;

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

Route::resource('/documents', DocumentController::class);

Route::get("/notes", [NoteController::class, 'index']);
Route::get('/documents/{id}/notes', [NoteController::class, 'show']);
Route::post("/documents/{id}/note", [NoteController::class, 'store']);

Route::post("/image/upload", [ImageController::class, 'upload']);
Route::post("/image/predict", [ImageController::class, 'predict']);