<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    
    public function index() {
        $menu = Menu::all();
        return view('admin.Menu.index', compact('menu'));
    }

    public function create() {
        return view('admin.Menu.create');
    }

}
