<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewServicesController;
use App\Http\Controllers\ViewTestimonyController;
use App\Http\Controllers\ViewBenefitController;
use App\Http\Controllers\HeroViewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\DiscussViewController;
use App\Http\Controllers\VisiViewController;
use App\Http\Controllers\MisiViewController;
use App\Http\Controllers\SkillViewController;
use App\Http\Controllers\HomepageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//MAIN
Route::get('/',[HomepageController::class,'home'])->name('home');
Route::get('/about',[HomepageController::class,'about'])->name('about');
Route::get('/portfolio',[HomepageController::class,'portfolio'])->name('portfolio');
Route::get('/gallery',[HomepageController::class,'gallery'])->name('gallery');
Route::get('/channel',[HomepageController::class,'channel'])->name('channel');


Route::get('/admin', [AdminController::class,'hero'])->name('admin');
Route::get('/admin/hero', [AdminController::class,'hero'])->name('admin');
Route::get('/admin/hero/create', [AdminController::class,'formHero']);
Route::get('/admin/hero/edit/{id}', [AdminController::class,'formEditHero']);
Route::get('/admin/visiMisi', [AdminController::class,'visiMisi']);
Route::get('/admin/visi/create', [AdminController::class,'formVisi']);
Route::get('/admin/visi/edit/{id}', [AdminController::class,'formEditVisi']);
Route::get('/admin/misi/create', [AdminController::class,'formMisi']);
Route::get('/admin/misi/edit/{id}', [AdminController::class,'formEditMisi']);

Route::get('/admin/gallery', [AdminController::class,'gallery']);
Route::get('/admin/gallery/create', [AdminController::class,'formGallery']);
Route::get('/admin/gallery/edit/{id}', [AdminController::class,'formEditGallery']);
Route::get('/admin/portfolio', [AdminController::class,'portfolio']);
Route::get('/admin/portfolio/create', [AdminController::class,'formPortfolio']);
Route::get('/admin/portfolio/edit/{id}', [AdminController::class,'formEditPortfolio']);
Route::get('/admin/services', [AdminController::class,'services']);
Route::get('/admin/services/create', [AdminController::class,'formServices']);
Route::get('/admin/services/edit/{id}', [AdminController::class,'formEditServices']);
Route::get('/admin/subs', [AdminController::class,'subs']);