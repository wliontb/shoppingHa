<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\Setting;
use App\Slider;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $product;
    private $order;
    private $user;
    private $category;
    private $tag;
    private $setting;
    private $slider;

    public function __construct(Product $product, Order $order, User $user, Category $category, Tag $tag, Setting $setting, Slider $slider){
            $this->product = $product;
            $this->order = $order;
            $this->user = $user;
            $this->category = $category;
            $this->tag = $tag;
            $this->setting = $setting;
            $this->slider = $slider;
    }

    public function index(){
        $orders = $this->order->latest()->take(6)->get();
        $products = $this->product->latest()->take(5)->get();
        $dataCount = [
            'orders' => $this->order->count(),
            'categories' => $this->category->count(),
            'products' => $this->product->count(),
            'users' => $this->user->count(),
            'tags' => $this->tag->count(),
            'settings' => $this->setting->count(),
            'sliders' => $this->slider->count(),
        ];
        return view('admin.index',compact('products','orders','dataCount'));
    }

    public function loginAdmin(){
        if(auth()->check()){
            return redirect()->to('admin/index');
        }
        return view('home/login');
    }

    public function postLoginAdmin(Request $request){
        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ],$remember)){
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['msg'=>'Tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    public function register(){
        return view('home/register');
    }

    public function postregister(Request $request){
        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->password!=$request->confirm_password){
            return redirect()->back()->withErrors(['msg'=>'Mật khẩu xác nhận sai !']);
        } else {
            $dataInsert['password'] = Hash::make($request->password);
            $this->user->create($dataInsert);
            return redirect()->route('login')->withErrors(['msg','Đăng ký thành công !']);
        }
        return redirect()->route('register');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
