<?php

use App\Models\order;
use GuzzleHttp\Middleware;


use DebugBar\Bridge\SlimCollector;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SecondCategoryController;

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
    return view('front.index');
});

Route::get('/mig', function () {
    Artisan::call('migrate');
    echo  "done";
});

Auth::routes();

Route::name('NoMe.')->group(function(){
    Route::get('/',[HomeController::class ,'home'])->name('home');
    Route::get('about',[HomeController::class ,'about'])->name('about');
    // Route::post('findProduct',[HomeController::class ,'findProduct'])->name('findProduct');
    Route::get('products',[HomeController::class ,'products'])->name('products');
    Route::get('productpage/{product:product_name}',[HomeController::class ,'productpage'])->name('productpage');
    Route::get('category/{category:category_name}',[HomeController::class ,'categorypage'])->name('categorypage');
    Route::get('secondCategory/{secondCategory:second_category_name}',[HomeController::class ,'secondCategorypage'])->name('secondCategorypage');
    Route::get('subCategory/{subCategory:sub_category_name}',[HomeController::class ,'subCategorypage'])->name('subCategorypage');

    Route::post('order' , [HomeController::class , 'order'])->name('order');
    Route::get('contact',[HomeController::class ,'contact'])->name('contact');
    Route::post('send-email', [MailController::class, 'sendEmail'])->name('send-email');
    Route::get('send-email/index', [MailController::class, 'index'])->name('send-email.index');
    Route::get('findProduct',[HomeController::class ,'findProduct'])->name('findProduct');
    Route::get('offers' , [HomeController::class , 'offers'])->name('offers');
    Route::get('app', [HomeController::class , 'app'])->name('app');
});

Route::prefix('admin')->middleware('auth','checkRole')->name('admin.')->group(function(){
    Route::get('/',[HomeController::class ,'control_panel'])->name('control_panel');
    Route::resource('slider', SliderController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('second_categories', SecondCategoryController::class);
    Route::resource('sub_categories', SubCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::put('out_of_stock/{id}' , [ProductController::class , 'out_of_stock'])->name('out_of_stock');
    Route::put('not_out_of_stock/{id}' , [ProductController::class , 'not_out_of_stock'])->name('not_out_of_stock');
    Route::resource('users', UserController::class);
    Route::resource('offers', OfferController::class);
    Route::resource('orders', OrderController::class);
    Route::get('order/active',[OrderController::class ,'active'])->name('orders.active');
    Route::get('order/noactive',[OrderController::class ,'noactive'])->name('orders.noactive');
});
