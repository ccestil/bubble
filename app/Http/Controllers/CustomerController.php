<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'created_at'); // Default sort by creation date
        $sortDirection = $request->input('direction', 'desc'); // Default direction: descending (latest first)

        // Validate the sort field to prevent errors
        $validSortFields = ['name', 'created_at'];
        if (!in_array($sortField, $validSortFields)) {
            $sortField = 'created_at'; // Default to created_at if an invalid field is provided
        }

        // Determine sort direction for name and created_at
        $sortDirectionName = ($sortField == 'name') ? ($sortDirection == 'asc' ? 'desc' : 'asc') : 'asc';
        $sortDirectionCreated = ($sortField == 'created_at') ? ($sortDirection == 'asc' ? 'desc' : 'asc') : 'asc';

        if ($sortField == 'name') {
            // Use a join to access user's first_name for sorting
            $customers = Customer::join('users', 'customers.user_id', '=', 'users.id')
                ->select('customers.*', 'users.first_name', 'users.last_name') // Select necessary columns
                ->orderBy('users.first_name', $sortDirection)
                ->get();
        } else {
            // Use a join to access the created_at column from the users table
            $customers = Customer::join('users', 'customers.user_id', '=', 'users.id')
                ->select('customers.*', 'users.created_at') // Select customer data and user's created_at
                ->orderBy('users.created_at', $sortDirection)
                ->get();
        }

        $totalCustomers = Customer::count();

        return view('admin.customer', compact('customers', 'totalCustomers', 'sortField', 'sortDirectionName', 'sortDirectionCreated'));
    }

    /** 
     * Show the form for creating a new customer.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified customer.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
