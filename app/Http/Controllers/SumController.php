<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumController extends Controller
{
    //
    public function sum(String $num1, String $num2){
        $hasil = $num1 + $num2;
        return $hasil;
    }

    public function subs(String $num1, String $num2){
        $hasil = $num1 - $num2;
        return $hasil;
    }

}

