<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;

class MenuController extends Controller
{
    
    public function index() {
        $menu = Menu::all();
        return view('admin.Menu.index', compact('menu'));
    }

    public function create() {
        $category = Category::all();
        return view('admin.Menu.create', compact('category'));
    }

    public function store(MenuStoreRequest $request) {

        $menu = new Menu;

        if($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('menu', $filename);
            $menu->image = $filename;

        }

        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $menu->image
        ]);

        return redirect('admin/menu')->with('message', 'Menu create successfully');

    }

}
