<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller; // Import the base Controller class

class CustomerTransactionController extends Controller
{
    /**
     * Display details for a specific transaction (as a simplified receipt).
     *
     * @param  Transaction  $transaction
     * @return View|RedirectResponse
     */
    public function show(Transaction $transaction): View|RedirectResponse
    {
        try {
            $transaction->load('service', 'customer.user'); // Load service and customer's user


            if ($transaction->customer_id !== Auth::user()->customer->id) {
                Log::error('Unauthorized access to transaction: ' . $transaction->id . ' by customer: ' . Auth::id());
                abort(403, 'Unauthorized action.');
            }

            return view('customer.receipt', ['transaction' => $transaction]);
        } catch (\Exception $e) {
            Log::error('Error showing transaction receipt: ' . $e->getMessage());
            return back()->with('error', 'Unable to display transaction receipt.');
        }
    }



}