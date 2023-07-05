<?php

use App\Models\Establishment;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

function getEstablishments(): Collection
{
    return Establishment::query()->whereNull('deleted_at')->get();
}

function getServices(): Collection
{
    return Service::all();
}

function getDatesBetween(DateTime $initial_date, DateTime $final_date, bool $beforeToday = true): array
{
    $ret = [];

    $final_date_modified = clone $final_date; 
    $final_date_modified->modify( '+1 day' );

    $today = new DateTime();

    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($initial_date, $interval, $final_date_modified);

    foreach($daterange as $date){
        if($beforeToday)
        {
            array_push($ret, $date);
        }
        else
        {
            if($today < $date)
            {
                array_push($ret, $date);
            }
        }
    }

    return $ret;
}

function getBookingsByRoom(int $id): Collection
{
    return Booking::query()->select('bookings.*')->leftJoin('rooms', 'rooms.id', '=', 'bookings.room_id')->whereNull('bookings.deleted_at')->where(['rooms.user_id' => $id])
        ->orderBy('initial_date', 'DESC')->get();
}