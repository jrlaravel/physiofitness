<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('navbar-detail', [ApiController::class, 'navbar'])->name('navbar-detail');
Route::get('home-banner', [ApiController::class, 'home_banner'])->name('home-banner');
route::get('/blog-list', [ApiController::class, 'blog_list'])->name('blog-list')->name('blog-list');
route::get('/service-list', [ApiController::class, 'service'])->name('service-list');
route::get('/team-member', [ApiController::class, 'team_member'])->name('team-member');
route::post('store-appointment', [ApiController::class, 'store'])->name('store-appointment');
Route::post('/appointment/{id}/status', [ApiController::class, 'updateStatus']);
