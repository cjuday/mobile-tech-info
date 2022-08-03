<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AdminController;

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

/*Front End Pages*/
//Home
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return redirect('/');
});
Route::get('/',[FrontEndController::class,'home_data']);

//Categories
Route::get('/categories', function () {
    return view('categories');
});

//News
Route::get('/news', function () {
    return view('news');
});
Route::get('/news',[FrontEndController::class,'news_data']);
//News Reading
Route::get('/news_read', function () {
    return view('news_read');
});

//Videos
Route::get('/videos', function () {
    return view('videos');
});
Route::get('/videos',[FrontEndController::class,'videos_data']);

//Contact
Route::get('/contact', function () {
    return view('contact');
});
Route::post('mail_sent',[FrontEndController::class,'mail_add'])->name('mailsend');

//Brands
Route::get('/brands', function () {
    return view('brands');
});

//Devices
Route::get('/devices', function () {
    return view('devices');
});

//Products
Route::get('/products/{slug}', function () {
    return view('products');
});
Route::get('/products/{slug}',[FrontEndController::class,'products_data']);

//Terms of Usage
Route::get('/tos', function (){
   return view('tos'); 
});

//Privacy Policy
Route::get('/policy', function (){
   return view('policy'); 
});

//Disclaimer
Route::get('/disclaimer', function() {
   return view('disclaimer'); 
});

//Search
Route::get('/search', function() {
    return view('search'); 
 });

//Ranges
Route::get('/ranges',function() {
    return view('ranges');
});

//Buy
Route::get('/buy', function() {
    return view('buy');
});
//Admin Panel
//login
Route::get('/admin', function () {
    return view('admin/home');
});

Route::get('/admin/home', function () {
    return redirect('/admin');
});
Route::post('login',[AdminController::class,'login'])->name('admin.login');

//logout
Route::get('admin/logout', function () {
    if(session()->has('Admin'))
    {
        session()->pull('Admin');
    }  
    return redirect('admin/');
});

//dashboard
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});
Route::get('admin/dashboard',[AdminController::class,'dashboard_data']);

//general settings
Route::get('/admin/general', function () {
    return view('admin/general');
});
Route::get('/admin/general',[AdminController::class,'general_data']);
Route::post('general_updated',[AdminController::class,'general_data_save'])->name('admin.general_update');

//price range
Route::get('/admin/price_range', function () {
    return view('admin/price_range');
});

//categories
Route::get('/admin/categories', function () {
    return view('admin/categories');
});

//brands
Route::get('/admin/brands', function () {
    return view('admin/brands');
});

//news
Route::get('/admin/news', function () {
    return view('admin/news');
});

//videos
Route::get('/admin/videos', function () {
    return view('admin/videos');
});

//Devices
Route::get('/admin/devices', function(){
    return view('admin/devices');
});

//Buy
Route::get('/admin/buy', function() {
    return view('admin/buy');
});

//settings
Route::get('/admin/settings', function(){
   return view('admin/settings'); 
});
Route::get('/admin/settings',[AdminController::class,'admin_data']);
Route::post('admin_updated',[AdminController::class,'admin_update'])->name('admin.profile_update');

//admins
Route::get('/admin/admins', function(){
   return view('/admin/admins'); 
});

//mail
Route::get('/admin/mails', function(){
    return view('admin/mails');
});


//others
//TinyMCE
Route::post('upload',[AdminController::class,'upload_pic'])->name('img_upload');
Route::get('/storage', function () {
    Artisan::call('storage:link');
});