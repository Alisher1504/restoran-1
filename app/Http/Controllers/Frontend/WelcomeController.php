<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    
    public function index() {

        $special = Menu::all();
        return view('welcome', compact('special'));

    }

}
