<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        Session::forget('cart');

        dd(Session::get('cart'));

        return view('payment-success');
    }
}
