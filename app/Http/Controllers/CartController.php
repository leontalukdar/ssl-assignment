<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartProducts = Cart::content();

        return view('cart')->with([
            "cartProducts" => $cartProducts,
            "total" => 0
        ]);
    }

    public function add(Request $request)
    {
        Cart::add([
            'id' => $request->productId,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty
        ]);

        return redirect()->back()->with('msg', "Product ". $request->name. " has been added to the cart.");
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

        return redirect()->route('cart.index')->with('msg', 'Cart Updated Successfully');
    }

    public function remove(Request $request)
    {
        Cart::remove($request->rowId);

        return redirect()->route('cart.index')->with('remove_msg', 'Cart Item Has Been Removed');
    }

}
