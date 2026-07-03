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
}) ->whereNumber("id")
;

Route::get('/user/{username}', function(string $username){
    return "Name=$username";
}) ->where('username', '[a-z]+')
;

Route::get('{lang}/productc/{category?}', function(string $lang, string $category = null){
    return "Prodcut Category=$category from Lang=$lang";
}) ->where(['lang' => '[a-z]{2}', 'category' => '[a-z]{4,}'])
;