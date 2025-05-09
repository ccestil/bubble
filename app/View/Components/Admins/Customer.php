<?php

namespace App\View\Components\Admins;

use Illuminate\View\Component;

class Customer extends Component
{
    public $customers;
    public $totalCustomers;

    public function __construct($customers, $totalCustomers)
    {
        $this->customers = $customers;
        $this->totalCustomers = $totalCustomers;
    }

    public function render()
    {
        return view('components.admins.customer');
    }
}

