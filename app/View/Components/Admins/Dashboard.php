<?php

namespace App\View\Components\Admins;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Dashboard extends Component
{
    public $timePeriod;
    public $totalRevenue;
    public $revenueBreakdown;
    public $totalTransactions; 
    public $activeTransactions; // Add this
    public $totalCustomers; // Add this
    public $dailyAverageTransactions; // Add this

    public function __construct(
        $timePeriod = null,
        $totalRevenue = null,
        $revenueBreakdown = null,
        $totalTransactions = null,
        $activeTransactions = null,
        $totalCustomers = null,
        $dailyAverageTransactions = null
    ) {
        $this->timePeriod = $timePeriod;
        $this->totalRevenue = $totalRevenue;
        $this->revenueBreakdown = $revenueBreakdown;
        $this->totalTransactions = $totalTransactions;
        $this->activeTransactions = $activeTransactions;
        $this->totalCustomers = $totalCustomers;
        $this->dailyAverageTransactions = $dailyAverageTransactions;
    }

    public function render(): View
    {
        return view('components.admins.dashboard'); // Make sure this path is correct
    }
}