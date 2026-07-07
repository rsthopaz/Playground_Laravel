<?php

namespace App\Services;



class CheckoutServices
{
    /**
     * Create a new class instance.
     */
    public function calculate(array $data) :array
    {
        //
        $subtotal = $data['subtotal'];
        $voucher = strtoupper($data['voucher'] ?? '');
        $member = $data['member'];

        $awal = $data['subtotal'];

        $voucherdiscount = 0;

        if($voucher == "DISKON10" && $subtotal >= 20000){
            $voucherdiscount = min($subtotal *0.1, 30000);
        }

        if($voucher == "HEMAT50" && $subtotal >= 500000){
            $voucherdiscount = $subtotal *0.5;
        }

        $subtotal = $subtotal - $voucherdiscount;

        $memberdiscount = 0;

        if($member){
            $memberdiscount = $subtotal*0.05;
            $subtotal = $subtotal - $memberdiscount;
        }
        //tax
        $tax = $subtotal * 0.11;
        $subtotal += $tax;

        return [
    // "subtotal": 250000,
    // "voucher_discount": 25000,
    // "member_discount": 11250,
    // "tax": 23512.5,
    // "total": 237262.5
    'subtotal' => $awal,
    'voucher_discount' => $voucherdiscount,
    'member_discount' => $memberdiscount,
    'tax' => $tax,
    'total' => $subtotal
        ];

    }
}
