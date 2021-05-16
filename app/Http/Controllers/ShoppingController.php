<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShoppingController extends Controller
{
    private $product;
    private $category;
    private $order;

    public function __construct(Product $product, Category $category, Order $order)
    {
        $this->product = $product;
        $this->category = $category;
        $this->order = $order;
    }

    public function cart()
    {
        $categorys = $this->category->latest()->where('parent_id',0)->get();
        $products = Cart::content();
        return view('shopping.cart', compact('products','categorys'));
    }

    public function checkout()
    {
        $categorys = $this->category->latest()->where('parent_id',0)->get();
        $products = Cart::content();
        return view('shopping.checkout', compact('products','categorys'));
    }

    public function addtocart($id)
    {
        $product = $this->product->find($id);
        Cart::add($product->id, $product->name, 1, $product->price, 0, ['image' => $product->feature_image_path]);
        return redirect()->route('cart');
    }

    public function addtocart_qty(Request $request, $id)
    {
        $product = $this->product->find($id);
        $quantity = (int)$request->quantity;
        Cart::add($product->id, $product->name, $quantity, $product->price, 0, ['image' => $product->feature_image_path]);
        return redirect()->route('cart');
    }

    public function removecart($id)
    {
        Cart::remove($id);
        return redirect()->route('cart');
    }

    public function destroycart()
    {
        Cart::destroy();
        return redirect()->route('cart');
    }

    public function addorder(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataCart = Cart::content();
            $dataInsert = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'note' => $request->note,
                'total_price' => Cart::subtotal(0,0,0),
                'total_product' => $dataCart->count(),
                'payment_method' => $request->payment_method
            ];

            if(auth()->check()){
                $dataInsert['user_id'] = auth()->user()->id;
            } else {
                $dataInsert['user_id'] = 0;
            }

            $order = $this->order->create($dataInsert);
            //add product_order
            foreach($dataCart as $key=>$value){
                $order->product_order()->create([
                    'product_id' => $value->id,
                    'quantity' => $value->qty,
                ]);
            }
            DB::commit();
            Cart::destroy();
            return redirect()->route('cart')->withErrors(['msg'=>'Bạn đã đặt hàng thành công !']);
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().'-- Line : '.$exception->getLine());
        }

    }
}
