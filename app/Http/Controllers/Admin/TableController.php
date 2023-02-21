<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    
    public function index() {
        $table = Table::all();
        return view('admin.Table.index', compact('table'));
    }

    public function create() {
        return view('admin.table.create');
    }

}
