<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    public function __construct(Slider $slider, Category $category, Product $product){
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }
    public function index(){
        $sliders = $this->slider->latest()->get();
        $categorys = $this->category->where('parent_id',0)->latest()->get();
        $products = $this->product->latest()->take(6)->get();
        $products_recommend = $this->product->latest('views_count','desc')->get();

        return view('home.home',compact('sliders','categorys','products','products_recommend'));
    }

    public function category($slug, $id){
        $categorys = $this->category->where('parent_id',0)->latest()->get();
        $products = $this->product->where('category_id',$id)->get();
        return view('home.category',compact('categorys','products'));
    }
}
