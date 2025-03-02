<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    private $products = [
        ["id" => 1, "name" => "Kopi Blend Arabika Robusta", "description" => "Kombinasi Arabika & Robusta dengan rasa seimbang, cocok untuk espresso.", "price" => 180000, "stock" => 13, "image" => "ararobu.jpg"],
        ["id" => 2, "name" => "Kopi Robusta Ijen Raung", "description" => "Robusta dengan profil rasa cocoa, dark chocolate, dan nutty, ideal untuk
                            espresso.", "price" => 165000, "stock" => 8, "image" => "araklu.jpg"],
        ["id" => 3, "name" => "Kopi Arabika Budget Blend", "description" => "Blend Arabika dengan harga terjangkau, cocok untuk kopi susu dan espresso.", "price" => 120000, "stock" => 12, "image" => "aracomme.jpg"],
        ["id" => 4, "name" => "Kopi Arabica Magic Coffee Blend", "description" => "Blend Arabika dari Brazil & Java, cocok untuk espresso dan kopi susu.", "price" => 205000, "stock" => 15, "image" => "arablend.jpg"]
    ];

    public function index()
    {
        return view('home', ['products' => $this->products]);
    }

    public function addToCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            foreach ($this->products as $product) {
                if ($product['id'] == $id) {
                    $cart[$id] = [
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'quantity' => 1
                    ];
                    break;
                }
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function cart()
    {
        return view('cart', ['cart' => session()->get('cart', [])]);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }
}
