<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Corrected singular relationship
        $customer = $user->customer()->with('transactions.service')->first();

        return view('customer.dashboard', compact('user', 'customer'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('customer.profile', compact('user'));
    }
}
