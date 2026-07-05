<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ShowCarController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\SumController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LayoutController;



// Route::get('/', [ViewController::class, 'index'] 

//     // $producturl = route('product.view', ['id'=>12]);
//     // dd($producturl);
//     // return view('welcome');
// );

// Route::get('/', [LayoutController::class, 'index']);
Route::get('/', function(){
    return view('dashboard.index');
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

Route::get('/car', [CarController::class, 'index']);

Route::controller(CarController::class) ->group(function(){
    Route::get('/car2', 'index2');
     
});

Route::get('invoke', ShowCarController::class);

// Route::resource('/products', ProductController::class);

Route::apiResources([
'motors' => MotorController::class,
'products' => ProductController::class
]);

Route::controller(SumController::class) -> group(function(){
    Route::get('/sumc/{num1}/{num2}', 'sum');
    Route::get('/subsc/{num1}/{num2}', 'subs');
});

Route::get('/hello', [HelloController::class, 'welcome']);