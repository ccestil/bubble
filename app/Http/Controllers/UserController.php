<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => $request->role === 'customer' ? 'required|min:8|confirmed' : 'nullable',
            'role'       => 'required|in:customer,employee,owner',
        ]);

        if ($request->role === 'customer') {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            $validated['password'] = bcrypt('defaultpassword'); // generate random password
        }

        $user = User::create($validated); // Create the User

        // Create the Customer record and associate it with the User
        if ($request->role === 'customer') {
            Customer::create([
                'user_id' => $user->id,
            ]);
        }

        return redirect('/login');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
