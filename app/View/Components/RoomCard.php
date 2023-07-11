<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RoomCard extends Component
{
    public $room;

    public function __construct($room)
    {
        $this->room = $room;
    }

    public function render()
    {
        return view('components.room-card');
    }
}