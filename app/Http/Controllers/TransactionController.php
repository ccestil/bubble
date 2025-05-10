<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('customer.user', 'service')->get();
        $totalTransactions = $transactions->count();
    
        return view('admin.transaction', compact('totalTransactions', 'transactions'));
    }
    
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::with('user')->get()->map(function ($customer) {
            return [
                'id' => $customer->id,
                'text' => $customer->user->first_name . ' ' . $customer->user->last_name . ' (' . $customer->user->email . ')',
            ];
        });

        $services = Service::all()->pluck('service_name', 'id');
        $employees = Employee::with('user')->get()->pluck('user.first_name', 'id');

        return view('admin.transactions.create', compact('customers', 'services', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'employee_id' => 'required|exists:employees,id',
            'laundry_status' => 'required|in:Washing,Drying,Ready for Pickup,Completed',
            'payment_status' => 'required|in:Paid,Unpaid',
        ]);
    
        $service = Service::findOrFail($request->service_id);
        $totalAmount = $request->weight * $service->price_per_kg;
    
        $transaction = Transaction::create(array_merge($request->all(), ['total_amount' => $totalAmount]));
    
        // Create the Payment record ONLY if the transaction is marked as 'Paid'
        if ($request->payment_status === 'Paid') {
            Payment::create([
                'transaction_id' => $transaction->id,
                'payment_amount' => $totalAmount,
                'payment_method' => 'Cash', // Hardcoded for now (you might want to get this from the request)
                'employee_id'    => $request->employee_id,
            ]);
        }
    
        return redirect()->route('admin.transaction')->with('success', 'Transaction created successfully!');
    }




    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $customers = Customer::with('user')->get()->map(function ($customer) {
            return [
                'id' => $customer->id,
                'text' => $customer->user->first_name . ' ' . $customer->user->last_name . ' (' . $customer->user->email . ')',
            ];
        });
    
        $services = Service::all()->pluck('service_name', 'id');
        $employees = Employee::with('user')->get()->pluck('user.first_name', 'id');
    
        return view('admin.transactions.edit', compact('transaction', 'customers', 'services', 'employees'));
    }
    
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'employee_id' => 'required|exists:employees,id',
            'weight' => 'required|numeric|min:0',
            'laundry_status' => 'required|in:Washing,Drying,Ready for Pickup,Completed',
            'payment_status' => 'required|in:Paid,Unpaid',
        ]);
    
        $service = Service::findOrFail($request->service_id);
        $totalAmount = $request->weight * $service->price_per_kg;
    
        $transaction->update(array_merge($request->all(), ['total_amount' => $totalAmount]));
    
        return redirect()->route('admin.transaction')->with('success', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    
        return redirect()->route('admin.transaction')->with('success', 'Transaction deleted successfully!');
    }
}
