<?php

namespace App\View\Components\Admins;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection; // Import the Collection class

class Service extends Component
{
    /**
     * Create a new component instance.
     */

    public Collection $services;
    public function __construct(Collection $services)
    {
        $this->services = $services;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admins.service');
    }
}
