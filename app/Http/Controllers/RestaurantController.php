<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Http\Request;

class RestaurantController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        $category_id = $request->input('category_id');

        if ($category_id !== null) {
            $restaurants = Restaurant::where('name', 'like', "%{$keyword}%")->where('category_id', $category_id)->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $restaurants = Restaurant::where('name', 'like', "%{$keyword}%")->orderBy('created_at', 'desc')->paginate(10);
        }

        $categories = Category::all();

        return view('restaurants.index', compact('restaurants', 'categories', 'keyword', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant) {
        $reservation_start_date = date('Y-m-d');

        $reservation_start_time = $restaurant->opening_time;
        $reservation_end_time = $restaurant->closing_time;
        $time_unit = 30;

        $reviews = $restaurant->reviews()->paginate(5);

        return view('restaurants.show', compact('restaurant', 'reservation_start_date', 'time_unit', 'reservation_start_time', 'reservation_end_time', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant) {
        //
    }
}
