<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Services\CheckoutServices;


class CheckoutController extends Controller
{
    //
    public function checkin(
     CheckoutRequest $checkoutrequest,
     CheckoutServices $checkoutservices
    ){
    $result = $checkoutservices->calculate($checkoutrequest->validated());

    return response()->json($result);
    }
}
