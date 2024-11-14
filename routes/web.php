<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\BlogController;

Route::get('' , function(){
    return view('index');
});
Route::get('/pf-admin', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forget-password', [LoginController::class, 'forget_password'])->name('forget-password');
Route::post('/varify-email', [LoginController::class, 'varifyemail'])->name('varify-email');
Route::get('/new-password/{token}', [LoginController::class, 'newpassword'])->name('new-password');
Route::post('/reset-password', [LoginController::class,'reset_password'])->name('reset-password');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/navbar-detail', [NavbarController::class, 'index'])->name('navbar-detail');
Route::post('/store' , [NavbarController::class,'storeOrUpdate'])->name('store');
Route::get('/home-banner', [NavbarController::class, 'home_banner'])->name('home-banner');
Route::post('/add-home-banner', [NavbarController::class, 'store_banner'])->name('add-home-banner');
Route::get('/delete-home-banner/{id}', [NavbarController::class, 'delete_banner'])->name('delete-home-banner');
Route::get('/blog-list', [BlogController::class, 'index'])->name('blog-list');
Route::post('/store-blog', [BlogController::class, 'store_blog'])->name('store-blog');
Route::get('/delete-blog/{id}', [BlogController::class, 'delete_blog'])->name('delete-blog');
Route::get('/service-list', [BlogController::class, 'service'])->name('service-list');
Route::post('/store-service', [BlogController::class,'store_service'])->name('store-service');
Route::get('/delete-service/{id}', [BlogController::class,'delete_service'])->name('delete-service');
Route::get('/team-member', [BlogController::class, 'team_member'])->name('team-member');
Route::post('/store-team-member', [BlogController::class, 'store_team_member'])->name('store-team-member');
Route::get('/delete-team-member/{id}', [BlogController::class, 'delete_team_member'])->name('delete-team-member');
Route::get('/appointment', [BlogController::class, 'appointment'])->name('appointment');
route::get('/testimonial', [BlogController::class, 'testimonial'])->name('testimonial');
route::post('/store-testimonial', [BlogController::class, 'store_testimonial'])->name('store-testimonial');
route::get('/delete-testimonial/{id}', [BlogController::class, 'delete_testimonial'])->name('delete-testimonial');

