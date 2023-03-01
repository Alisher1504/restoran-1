<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    
    public function index() {
        $reservation = Reservation::all();
        return view('admin.Reservation.index', compact('reservation'));
    }

    public function create() {
        $table = Table::all();
        return view('admin.Reservation.create', compact('table'));
    }

    public function store(ReservationStoreRequest $request) {

        // Reservation::create($request->validated());

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
