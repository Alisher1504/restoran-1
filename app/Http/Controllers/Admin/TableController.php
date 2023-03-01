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

    public function edit($id) {

        $table = Table::findOrFail($id);
        return view('admin.Table.edit', compact('table'));

    }

    public function update(TableStoreRequest $request, $id) {

        $table = Table::findOrFail($id);
        $request->validated([
            'name' => 'required',
            'guest_number' => 'required',
            'status' => 'required',
            'location' => 'required',
        ]);

        $table->update([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);


        return redirect('admin/table')->with('status', "Table update successfully");

    }

    public function delete($id) {

        $delete = Table::findOrFail($id);
        $delete->delete();

        return redirect('admin/table')->with('status', "Table delete successfully");

    }

}
