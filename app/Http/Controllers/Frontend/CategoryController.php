<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function index() {

        $category = Category::all();
        return view('page.inc.category.index', compact('category'));

    }

    public function show($id) {

        $catemenu = Category::findOrFail($id);
        return view('page.inc.category.show', compact('catemenu'));
        
    }

}
