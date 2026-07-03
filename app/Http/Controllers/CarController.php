<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function index(){
        return "Index method from Controller";
    }

    public function index2(){
        return "Index method from Grouping Controller";
    }
}
