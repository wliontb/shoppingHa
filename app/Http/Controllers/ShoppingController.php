<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    private $product;
    public function __construct(Product $product){
        $this->product = $product;
    }

    public function cart(){
//        dd(Cart::content());
        $products = Cart::content();
        return view('shopping.cart',compact('products'));
    }

    public function checkout(){

    }

    public function addtocart($id){
        $product = $this->product->find($id);
        Cart::add($product->id,$product->name,1,$product->price,0,['image'=>$product->feature_image_path]);
        return redirect()->route('cart');
    }

    public function removecart($id){
        Cart::remove($id);
        return redirect()->route('cart');
    }

    public function destroycart(){
        Cart::destroy();
        return redirect()->route('cart');
    }
}
