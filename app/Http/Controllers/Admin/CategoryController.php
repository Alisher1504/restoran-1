<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    
    public function index(){
        $category = Category::all();
        return view('admin.Category.index', compact('category'));
    }

    public function create() {
        return view('admin.Category.create');
    }

    public function store(CategoryStoreRequest $request) {

        $date = new Category;

       
        if($request->hasfile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('category/', $filename);
            $date->image = $filename;

        }
        
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $date->image,
        ]);

        

        return redirect('admin/category');

    }

    public function edit($id) {

        $cate = Category::find($id);
        return view('admin.Category.edit', compact('cate'));

    }

    public function update(Request $request, $id) {

        $category = Category::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        
        

        $image = $category->image;

        if($request->hasFile('image')) {

            $path = 'category/' . $category->image;

            if(File::exists($path)){
                File::delete($path);
            }
            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' . $ext;
            $file->move('category/', $filename);
            $image = $filename;

        }

        

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect('admin/category');

    }

}
