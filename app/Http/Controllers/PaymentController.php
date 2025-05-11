<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Employee; // Import the Employee model
use Carbon\Carbon; // Import Carbon for date/time manipulation

class PaymentController extends Controller
{
    /**
     * Show the form for processing payment for a specific transaction.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\View\View    
     */

    public function showPaymentForm(Transaction $transaction)
    {
        $now = Carbon::now();
        $currentTime = $now->format('H:i:s'); // Get current time in "HH:MM:SS" format

        $currentShiftEmployees = Employee::where('work_shift', $currentTime)->get();

        // If no employees found for the exact time, fetch all employees
        if ($currentShiftEmployees->isEmpty()) {
            $currentShiftEmployees = Employee::all();
        }

        return view('admin.payments.process', compact('transaction', 'currentShiftEmployees'));
    }

    /**
     * Process the payment for a specific transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processPayment(Request $request, Transaction $transaction)
    {
        $request->validate([
            'payment_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);

        // Check if a payment already exists for this transaction
        $existingPayment = Payment::where('transaction_id', $transaction->id)->first();

        if ($existingPayment) {
            // Update the existing payment record
            $existingPayment->update([
                'payment_amount' => $request->payment_amount,
                'payment_method' => $request->payment_method,
                'employee_id'    => $request->employee_id,
            ]);
            $payment = $existingPayment; // Use the updated payment
        } else {
            // Create a new payment record if one doesn't exist
            $payment = Payment::create([
                'transaction_id' => $transaction->id,
                'payment_amount' => $request->payment_amount,
                'payment_method' => $request->payment_method,
                'employee_id'    => $request->employee_id,
            ]);
        }

        // Update the transaction's payment status to 'Paid'
        $transaction->update(['payment_status' => 'Paid']);

        // Eager load all necessary data
        $transaction->load('customer.user', 'service', 'employee.user');

        $receiptData = [
            'transaction' => $transaction,
            'payment' => $payment,
            'businessName' => 'Bubbleworks',  //  Replace with your actual business name
            'businessAddress' => '123 Laundry St. Matina, Davao City', //  Replace with your address
            'businessPhone' => '555-1212',  //  Replace with your phone number
        ];

        //  For now, let's just return the data to check if it's correct
        return view('admin.payments.receipt', $receiptData);

        //  Later, we'll return the actual receipt view/PDF
        //  return $this->generateReceiptView($receiptData);  //  Or generatePDF($receiptData);
    }
}
