<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Table;
use App\Enums\TableStatus;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    
    public function stepOne(Request $request) {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('page.inc.reservation.reservation-one', compact('reservation', 'min_date', 'max_date'));

    }

    public function stepOne_store(Request $request) {

        $validate = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'tel_number' => ['required'],
            'rest_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'guest_number' => ['required'],
        ]);

        if(empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validate);
            $request->session()->put('reservation', $reservation);
        } else {

            $reservation = $request->session()->get('reservation');
            $reservation->fill($validate);
            $request->session()->put('reservation', $reservation);

        }
 
        return redirect('/reservation/step-two');

    }

    public function stepTwo(Request $request) {

        $reservation = $request->session()->get('reservation');
        $res_table_ids = Reservation::orderBy('rest_date')->get()->filter(function ($value) use ($reservation) {
            return $value->rest_date->format('Y-m-d') == $reservation->rest_date->format('Y-m-d');
        })->pluck('table_id');
        $table = Table::where('status', TableStatus::Aviable)->where('guest_number', '>=', $reservation->guest_number)->whereNotIn('id', $res_table_ids)->get();
        
        return view('page.inc.reservation.reservation-two', compact('reservation', 'table'));
    }


    public function stepTwo_store(Request $request) {

        $validated = $request->validate([
            'table_id' => ['required']
        ]);

        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');

        return redirect('thanks_you');

    }


}
