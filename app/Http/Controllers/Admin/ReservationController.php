<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    
    public function index() {
        $reservation = Reservation::all();
        return view('admin.Reservation.index', compact('reservation'));
    }

    public function create() {
        return view('admin.Reservation.create');
    }

}
