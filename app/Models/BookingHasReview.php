<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHasReview extends Model
{
    protected $table = 'booking_has_reviews';

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
