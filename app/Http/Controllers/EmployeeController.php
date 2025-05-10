<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller

{


    public function index()
    {
        $employees = Employee::with('user')->get();
        return view('admin.employee', compact('employees'));
    }


    public function create()
    {
        return view('auth.create-employee');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'role_task'     => 'required|string|max:255',
            'work_shift'    => 'required',
        ]);

        // Create the User without a password
        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'password'   => bcrypt('defaultpassword'), // set a random default or generate a token if needed
        ]);

        // Create the Employee linked to User
        Employee::create([
            'user_id'    => $user->id,
            'role_task'  => $validated['role_task'],
            'work_shift' => $validated['work_shift'],
        ]);

        return redirect()->back()->with('success', 'Employee created successfully!');
    }

    public function edit(Employee $employee)
    {
        return view('auth.create-employee', compact('employee'));
    }
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $employee->user_id, // Ignore current user's email
            'role_task'     => 'required|string|max:255',
            'work_shift'    => 'required',
        ]);

        $employee->user->update([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
        ]);

        $employee->update([
            'role_task'  => $validated['role_task'],
            'work_shift' => $validated['work_shift'],
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->user()->delete(); // Delete the associated user as well
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }

}
