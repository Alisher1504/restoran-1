<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;

class TableController extends Controller
{
    
    public function index() {
        $table = Table::all();
        return view('admin.Table.index', compact('table'));
    }

    public function create() {
        return view('admin.table.create');
    }

    public function store(TableStoreRequest $request) {

        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return redirect('admin/table')->with('status', 'Table create successfully');

    }

}
