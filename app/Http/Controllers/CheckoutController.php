<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Kosongkan session keranjang setelah pembayaran sukses
        Session::forget('cart');

        return redirect()->route('payment.success');
    }

    public function success()
    {
        return view('payment-success');
    }

    public function index()
    {
        $cart = Session::get('cart', []); // Ambil cart dari session, jika tidak ada set ke array kosong
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return view('checkout', compact('cart', 'total'));
    }
}
