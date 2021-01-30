<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::get('order/generate', [OrderController::class, 'generate'])->name('order.generate');