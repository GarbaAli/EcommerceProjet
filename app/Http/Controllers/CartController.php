<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');                                                
    }

    public function store(Request $request)
    {
        //On fait une recherche. esceque le produit existe dja dans le panier?
        $duplicata = Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->product_id;
        });

        if ($duplicata->isNotEmpty()) {
            return redirect()->route('product.shop')->with('success', 'Produit existe deja dans le panier.');
        }else{

            $product =  Product::find($request->product_id);
            Cart::add($product->id, $product->title, $request->qte, $product->price)
              ->associate('App\Product');
      
              return redirect()->route('product.shop')->with('success', 'Produit ajouté au panier.');
        }

    }

    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        Cart::update($rowId, $data['qty']);

        Session::flash('success', 'La quantite du produit est passé a ' .$data['qty'].'.');
        return response()->json(['success' => 'Cart quantity Has Been Updated']);
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

}
