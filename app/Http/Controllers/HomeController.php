<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    private $order;
    private $user;
    public function __construct(Slider $slider, Category $category, Product $product, Order $order, User $user){
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->order = $order;
        $this->user = $user;
    }
    public function index(){
        $category_recommend = $this->category->latest()->where('parent_id',0)->where('recommend',1)->take(3)->get();
        $sliders = $this->slider->latest()->get();
        $categorys = $this->category->where('parent_id',0)->latest()->get();
        $products = $this->product->latest()->take(6)->get();
        $category1 = $this->category->find(3);
        $category2 = $this->category->find(4);
        $products_recommend = $this->product->latest('views_count','desc')->get();

        return view('home.home',compact('category1','category2','sliders','categorys','products','products_recommend','category_recommend'));
    }

    public function search(Request $request){
        $categorys = $this->category->where('parent_id',0)->latest()->get();
        $query = $request->get('keyword');
        $products = $this->product->where('content', 'LIKE', "%{$query}%")->where('name', 'LIKE', "%{$query}%")->paginate(5);

        return view('home.search',compact('products','query','categorys'));
    }

    public function account(){
        $orders = $this->order->where('user_id',auth()->user()->id)->latest()->get();
        $categorys = $this->category->where('parent_id',0)->latest()->get();
        return view('home.account',compact('categorys','orders'));
    }

    public function updateaccount(Request $request){
        $dataUpdate = [
            'fullname' => $request->fullname,
            'address' => $request->address,
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        $this->user->find(auth()->id())->update($dataUpdate);
        return redirect()->route('account');
    }

    public function changepassword(Request $request){
        if(auth()->attempt([
            'id' => auth()->id(),
            'password' => $request->cur_password,
        ])){
            if($request->new_password==$request->confirm_password){
                $this->user->find(auth()->id())->update([
                    'password' => Hash::make($request->new_password)
                ]);
            } else {
                return redirect()->back()->withErrors(['confirmpass'=>'Mật khẩu xác nhận không khớp !']);
            }
        } else {
            return redirect()->back()->withErrors(['passother'=>'Mật khẩu sai !']);
        }
        return redirect()->route('account');
    }

    public function category($slug, $id){
        $categorys = $this->category->where('parent_id',0)->latest()->get();
        $categoryCur = $this->category->find($id);
        $products = $this->product->where('category_id',$id)->paginate(6);
        $products_recommend = $this->product->latest('views_count','desc')->take(4)->get();
        return view('home.category',compact('categorys','products','products_recommend','categoryCur'));
    }

    public function product($id)
    {
        $categorys = $this->category->where('parent_id', 0)->latest()->get();
        $product = $this->product->find($id);
        $products_related = $this->product->where('category_id',$product->category_id)->inRandomOrder()->get();

        return view('home.product', compact('product', 'categorys', 'products_related'));
    }
}
