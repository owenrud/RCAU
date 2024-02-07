<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeAPI;
use App\Http\Controllers\VisiAPI;
use App\Http\Controllers\MisiAPI;
use App\Http\Controllers\ServicesAPI;
use App\Http\Controllers\GalleryAPI;
use App\Http\Controllers\PortfolioAPI;
use App\Http\Controllers\ContactAPI;
use App\Http\Controllers\SubscribeAPI;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('hero')->group(function(){
    Route::get('/all',[HomeAPI::class,'all']);
    Route::post('/show',[HomeAPI::class,'show']);
    Route::post('/save',[HomeAPI::class,'save']);
    Route::post('/update',[HomeAPI::class,'update']);
    Route::post('/delete',[HomeAPI::class,'delete']);
});
Route::prefix('visi')->group(function(){
    Route::get('/all',[VisiAPI::class,'all']);
    Route::post('/show',[VisiAPI::class,'show']);
    Route::post('/save',[VisiAPI::class,'save']);
    Route::post('/update',[VisiAPI::class,'update']);
    Route::post('/delete',[VisiAPI::class,'delete']);
});
Route::prefix('misi')->group(function(){
    Route::get('/all',[MisiAPI::class,'all']);
    Route::post('/show',[MisiAPI::class,'show']);
    Route::post('/save',[MisiAPI::class,'save']);
    Route::post('/update',[MisiAPI::class,'update']);
    Route::post('/delete',[MisiAPI::class,'delete']);
});
Route::prefix('services')->group(function(){
    Route::get('/all',[ServicesAPI::class,'all']);
    Route::post('/show',[ServicesAPI::class,'show']);
    Route::post('/save',[ServicesAPI::class,'save']);
    Route::post('/update',[ServicesAPI::class,'update']);
    Route::post('/delete',[ServicesAPI::class,'delete']);
});
Route::prefix('gallery')->group(function(){
    Route::get('/all',[GalleryAPI::class,'all']);
    Route::post('/show',[GalleryAPI::class,'show']);
    Route::post('/save',[GalleryAPI::class,'save']);
    Route::post('/update',[GalleryAPI::class,'update']);
    Route::post('/delete',[GalleryAPI::class,'delete']);
});
Route::prefix('portfolio')->group(function(){
    Route::get('/all',[PortfolioAPI::class,'all']);
    Route::post('/show',[PortfolioAPI::class,'show']);
    Route::post('/save',[PortfolioAPI::class,'save']);
    Route::post('/update',[PortfolioAPI::class,'update']);
    Route::post('/delete',[PortfolioAPI::class,'delete']);
});
Route::prefix('contact')->group(function(){
    Route::get('/all',[ContactAPI::class,'all']);
    Route::post('/show',[ContactAPI::class,'show']);
    Route::post('/save',[ContactAPI::class,'save']);
    Route::post('/update',[ContactAPI::class,'update']);
    Route::post('/delete',[ContactAPI::class,'delete']);
});
Route::prefix('subscribe')->group(function(){
    Route::get('/all',[SubscribeAPI::class,'all']);
    Route::post('/show',[SubscribeAPI::class,'show']);
    Route::post('/save',[SubscribeAPI::class,'save']);
    Route::post('/update',[SubscribeAPI::class,'update']);
    Route::post('/delete',[SubscribeAPI::class,'delete']);
});