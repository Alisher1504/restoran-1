<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    
    public function index() {

        $menu = Menu::all();
        return view('page.inc.menu.index',compact('menu'));

    }

}
