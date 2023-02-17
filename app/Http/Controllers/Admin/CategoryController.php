<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function index(){
        $category = Category::all();
        return view('admin.Category.index', compact('category'));
    }

}
