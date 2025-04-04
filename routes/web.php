<?php

use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PromotionController::class, 'index']);
Route::resource('promotions', PromotionController::class);
