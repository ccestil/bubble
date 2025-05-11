<?php

namespace App\View\Components\Customers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;
    public $customer;


    public function __construct($user, $customer)
    {
        //
        $this->user = $user;
        $this->customer = $customer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customers.dashboard');
    }
}
