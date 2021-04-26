<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index(){
        return view('admin.setting.index');
    }

    public function create(){
        return view('admin.setting.add');
    }

    public function store(AddSettingRequest $request){
        dd('store');
    }
}
