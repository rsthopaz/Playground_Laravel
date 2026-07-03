<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $producturl = route('product.view', ['id'=>12]);
    dd($producturl);
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/producti/{id}', function(string $id){
    return "Product ID=$id";
}) ->name("product.view")
    ->whereNumber("id")
;

Route::get('/user/{username}', function(string $username){
    return "Name=$username";
}) ->where('username', '[a-z]+')
;

Route::get('{lang}/productc/{category?}', function(string $lang, string $category = null){
    return "Prodcut Category=$category from Lang=$lang";
}) ->where(['lang' => '[a-z]{2}', 'category' => '[a-z]{4,}'])
;

Route::prefix('admin')->group(function (){
    Route::get('/users', function(){
        return 'admin/users';
    });
});

// challenge
Route::get('sum/{num1}/{num2}', function(string $num1, string $num2){
    return $num1 + $num2;

}) ->whereNumber("num1", "num2")

;