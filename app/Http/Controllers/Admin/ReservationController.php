<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    
    public function index() {
        $reservation = Reservation::all();
        return view('admin.Reservation.index', compact('reservation'));
    }

    public function create() {
        $table = Table::where('status', TableStatus::Aviable)->get();
        return view('admin.Reservation.create', compact('table'));
    }

    public function store(ReservationStoreRequest $request) {

        // Reservation::create($request->validated());

        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number) {
            return back()->with('status', 'Pleace choos the table base on guest.');
        }
        $request_date = Carbon::parse($request->rest_date);
        foreach($table->reservations as $item) {
            if($item->rest_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('status', 'This table is reserved for this date.');
            }
        }

        $request->validated();

        Reservation::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'rest_date' => $request->rest_date,
            'table_id' => $request->table_id,
            'guest_number' => $request->guest_number,
        ]);

        return redirect('admin/reservation')->with('status', "Reservation create successfully");

    }


}
