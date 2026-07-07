<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LibraryController;

Route::post('/checkout', [CheckoutController::class, 'checkin']);
Route::post('/borrow', [LibraryController::class, 'borrow']);
