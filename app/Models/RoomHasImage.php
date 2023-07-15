<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomHasImage extends Model
{
    use HasFactory;
    protected $table = 'room_has_images';
    public $timestamps = false;

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
