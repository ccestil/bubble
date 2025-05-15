<?php

namespace App\View\Components\Admins;

use Illuminate\View\Component;

class Customer extends Component
{
    public $customers;
    public $totalCustomers;
    public $sortDirectionName;
    public $sortField;
    public $sortDirectionCreated;

    public function __construct($customers, $totalCustomers, $sortDirectionName, $sortField, $sortDirectionCreated)
    {
        $this->customers = $customers;
        $this->totalCustomers = $totalCustomers;
        $this->sortDirectionName = $sortDirectionName;
        $this->sortField = $sortField;
        $this->sortDirectionCreated = $sortDirectionCreated;
    }

    public function render()
    {
        return view('components.admins.customer');
    }
}

