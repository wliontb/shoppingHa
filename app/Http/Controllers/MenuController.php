<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menu;
    private $menuRecusive;

    public function __construct(MenuRecusive $menuRecusive,Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index(){
        $menus = $this->menu->latest()->paginate(5);
        return view('menu.index', compact('menus'));
    }

    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('menu.add',compact('optionSelect'));
    }

    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
        ]);

        return redirect()->route('menus.index');
    }

    public function edit($id){
        $menu = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menu->parent_id);
        return view('menu.edit',compact('menu','optionSelect'));
    }

    public function update($id, Request $request){
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
        ]);

        return redirect()->route('menus.index');
    }

    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
