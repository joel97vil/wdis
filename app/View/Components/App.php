<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;

class App extends Component
{
    public function __construct() {}

    public function render(): View|Closure|string
    {
        return view('layouts.app');
    }
}
