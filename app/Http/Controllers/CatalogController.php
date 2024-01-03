<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view("user.catalog",["Products"=>Product::all()]);
    }

    public function addProductToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $product->name,
                "quantity" => 1,
                "price" => '$22',
                "image" => $product->image,
                "gloss_level" => $product->gloss_level,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }
}
