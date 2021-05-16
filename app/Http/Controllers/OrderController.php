<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order;
    private $product_order;
    public function __construct(Order $order, ProductOrder $product_order){
        $this->order = $order;
        $this->product_order = $product_order;
    }
    public function index(){
        $orders = $this->order->latest()->paginate(5);
        return view('admin.order.index',compact('orders'));
    }

    public function detail($id){
        $order = $this->order->find($id);
        $product_order = $this->product_order->where('order_id',$id)->get();

        return view('admin.order.detail',compact('product_order','order'));
    }

    public function delete($id){
        $this->order->find($id)->delete();
        return redirect()->route('orders.index');
    }

    public function active($id){
        $this->order->find($id)->update([
            'status' => 1,
        ]);

        return redirect()->back()->withErrors(['msg'=>'Đã duyệt đơn !']);
    }
}
