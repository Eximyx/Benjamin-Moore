<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $products = Product::orderBy("created_at", "desc")->paginate(12);

        return view("user.catalog", ["Products" => $products, "category" => $categories]);
    }
    public function fetch(Request $request)
    {
        // return response()->json($request->category_id);
        $query = Product::query();
        if (isset($request['category_id']) && $request['category_id'] !== "0") {
            // return response()->json($request->category_id);
            $query->where("product_category_id", "=", $request["category_id"]);
        }
        // return response($query->get()->paginate(5));
        $products = $query->paginate(12);
        return view("user.search_result", ["Products" => $products])->render();
    }

    public function addProductToCart($id = null, $quantity = 0)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $product->title,
                "quantity" => 1,
                "price" => '22',
                "main_image" => $product->main_image,
                "gloss_level" => $product->gloss_level,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }
    public function changeCount(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = (int) $request['quantity'];
        }
        session()->put('cart', $cart);
        return response()->json(['success' => true, 's' => $cart]);
    }
    public function productCart()
    {
        return view('user.cart');
    }

    public function updateCart(Request $request)
    {
        return response()->json($request);
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Book added to cart.');
        }
    }

    public function deleteProduct(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }



}
