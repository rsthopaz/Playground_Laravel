<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/producti/{id}', function(string $id){
    return "Product ID=$id";
});

Route::get('/productc/{category?}', function(string $catogery = null){
    return "Prodcut Category=$category";
});