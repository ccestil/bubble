<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CustomerTransactionController extends Controller

{
    
    public function show(Transaction $transaction)
    {
        $this->authorize('view', $transaction);
        $transaction->load('service'); // Ensure service is loaded
    
        return view('customer.show', ['transaction' => $transaction]);
    }

    public function history()
    {
        $user = Auth::user();
        $customer = $user->customer()->with('transactions.service')->first();

        return view('customer.history', compact('customer'));
    }
}
