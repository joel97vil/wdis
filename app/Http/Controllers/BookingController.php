<?php

namespace App\Http\Controllers;

use Session;
use DateTime;
use DateInterval;
use DatePeriod;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function getBookingsByRoom($id)
    {
        $ret = [];

        if($id != null)
        {
            $today = date_create();
            $bookings = Booking::query()->where([['room_id', '=', $id], ['final_date', '>=', $today->modify('-1 day')]])->whereNull('deleted_at')->get();

            foreach($bookings as $obj)
            {
                $initial_date = new DateTime($obj->initial_date);
                $final_date = new DateTime($obj->final_date);

                $ret = getDatesBetween($initial_date, $final_date, false);
            }
        }

        return json_encode($ret);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = new Booking();

        $user_id = auth()->user() != null ? auth()->user()->id : null;
        $booking->user_id = $user_id;
        $booking->room_id = $request->input('room_id');
        $price = $request->input('total_price');
        $booking->people_amount = $request->input('people_amount');

        if($request->input('initial_date') != null)
        {
            $day = explode('/', $request->input('initial_date'))[0];
            $month = explode('/', $request->input('initial_date'))[1];
            $year = explode('/', $request->input('initial_date'))[2];
            $booking->initial_date = date_create($year.'-'.$month.'-'.$day);
        }
        else
        {
            $booking->initial_date = now();
        }

        if($request->input('final_date') != null)
        {
            $day = explode('/', $request->input('final_date'))[0];
            $month = explode('/', $request->input('final_date'))[1];
            $year = explode('/', $request->input('final_date'))[2];
            $booking->final_date = date_create($year.'-'.$month.'-'.$day);
        }
        else
        {
            $booking->final_date = now();
        }

        $booking->total_price = $price * count(getDatesBetween($booking->initial_date, $booking->final_date));
        
        $booking->created_at = now();
        $booking->updated_at = now();

        $booking->save();

        Session::flash('message', "La reserva s'ha completat correctament!");
        return redirect()->route('landing');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $booking = Booking::query()->where('id', $id)->whereNull('deleted_at')->get()->first();

        if($booking != null)
        {
            return view('booking.show', ['booking' => $booking]);
        }
        else
        {
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $booking = Booking::query()->where('id', $id)->get()->first();
        $user_id = auth()->user() != null ? auth()->user()->id : null;

        if($booking != null && $user_id == $booking->user_id)
        {
            $booking->deleted_at = now();
            $booking->save();

            Session::flash('message', "La reserva s'ha anul·lat correctament!");
        }
        else
        {
            Session::flash('error', "S'ha produït un error en la reserva.");
        }
        
        return redirect()->route('landing');
    }
}
