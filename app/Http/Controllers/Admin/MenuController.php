<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $menu->image
        ]);
        
        if($request->has('categories')){
            $menu->categories()->attach($request->categories); 
        }

        return redirect('admin/menu')->with('message', 'Menu create successfully');

    }

    public function edit($id) {

        $menu = Menu::findOrFail($id);
        $categories = Category::all();
        return view('admin.Menu.edit', compact('menu', 'categories'));

    }

    public function update(Request $request, $id) {

        $menu = Menu::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if($request->hasFile('image')){

            $path = 'menu/'. $menu->image;
            
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('menu', $filename);
            $menu->image = $filename;

        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $menu->image,
        ]);

        if($request->has('categories')) {

            $menu->categories()->sync($request->categories);

        }

        return redirect('admin/menu')->with('message', 'Menu update successfully');

    }

    public function delete($id) {

        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->back()->with('status', 'Menu delete successfully');

    }

}
