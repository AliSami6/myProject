<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\support\Facades\DB;
use App\Models\User;
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

Route::get('/home', function () {
    $brands=DB::table('brands')->get();
    $sliderHome=DB::table('sliders')->get();
    $portFolio=Portfolio::with('category')->get();
    $categories = Category::all();
    return view('home',compact('brands','sliderHome','portFolio','categories'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
       // $users = User::all();
        // query builder
        //$users = DB::table('users')->get();
       return view('admin.index'); })->name('dashboard');
});
// Category route
Route::get('/category/all/',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add/',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'Edit'])->name('edit.category');
Route::post('/category/update/{id}',[CategoryController::class,'Update'])->name('update.category');
Route::get('/category/softdelete/{id}',[CategoryController::class,'SoftDelete'])->name('sdelete.category');
Route::get('/category/restore/{id}',[CategoryController::class,'Restore'])->name('restore.category');
Route::get('/category/pdelete/{id}',[CategoryController::class,'Pdelete'])->name('pdelete.category');

Route::get('/brand/all/',[BrandController::class,'AllBrand'])->name('all.brand');

Route::post('/brand/all/',[BrandController::class,'StoreBrand'])->name('brand.store');

Route::get('/brand/edit/{id}', [BrandController::class,'edit'])->name('edit.brand');

Route::post('/brand/update/{id}', [BrandController::class,'update'])->name('update.brand');

Route::get('/brand/delete/{id}', [BrandController::class,'delete'])->name('delete.brand');

Route::get('/multi/image', [BrandController::class,'Multipic'])->name('multi.image');

Route::post('/multi/add', [BrandController::class,'StoreImage'])->name('store.image');

Route::get('/home/slider', [HomeController::class,'HomeSlider'])->name('home.slider');

Route::get('/home/slidercreate', [HomeController::class,'AddSlider'])->name('create.slider');

Route::post('/home/slidercreate', [HomeController::class,'AddSliderStore'])->name('create.slider');

Route::get('/home/slideredit/{id}', [HomeController::class,'edit_gallery'])->name('edit.slider');

Route::post('/home/slideredit/{id}', [HomeController::class,'AllGalleryImageUpdate'])->name('update.slider');

Route::get('/home/sliderdelete', [HomeController::class,'AddSliderStore'])->name('delete.slider');
// portfolio route
Route::get('/portfolio/all', [PortfolioController::class,'AllPortfolio'])->name('all.portfolio');
Route::get('/portfolio/create', [PortfolioController::class,'AddPortfolio'])->name('create.portfolio');
Route::post('/portfolio/store', [PortfolioController::class,'StorePortfolio'])->name('store.portfolio');
Route::get('/portfolio/edit/{id}', [PortfolioController::class,'edit_portfolio'])->name('edit.portfolio');
Route::post('/portfolio/edit/{id}', [PortfolioController::class,'update_portfolio'])->name('update.portfolio');

