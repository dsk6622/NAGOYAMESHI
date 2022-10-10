<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $reservations = Auth::user()->reservations()->orderBy('reservation_datetime', 'desc')->paginate(15);

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant) {
        $reservation_start_date = date('Y-m-d');

        $reservation_start_time = $restaurant->opening_time;
        $reservation_end_time = $restaurant->closing_time;
        $time_unit = 30;

        return view('reservations.create', compact('restaurant', 'reservation_start_date', 'time_unit', 'reservation_start_time', 'reservation_end_time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurant $restaurant) {
        $request->validate([
            'reservation_date' => 'required|after_or_equal:today',
            'reservation_time' => 'required',
            'number_of_people' => 'required|numeric|min:1',
        ]);

        $reservation = new Reservation();
        $reservation->reservation_datetime = $request->input('reservation_date') . ' ' . $request->input('reservation_time');
        $reservation->number_of_people = $request->input('number_of_people');
        $reservation->restaurant_id = $restaurant->id;
        $reservation->user_id = Auth::id();
        $reservation->save();

        return redirect()->route('restaurants.show', $restaurant)->with('flash_message', '予約が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('flash_message', '予約をキャンセルしました。');
    }
}
