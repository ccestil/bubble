<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; // Import the QueryException class

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([

            'service_name' => 'required',
            'price_per_kg' => 'required',


        ]);

        Service::create($validated);
            return redirect()->route('admin.services.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        return view('admin.services.create', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            // Add validation for other fields if 
        ]);

        $service->update($request->all());

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // Error code for integrity constraint violation
                return redirect()->route('admin.services.index')->with('error', 'Cannot delete this service. There are transactions associated with it.');
            }
            // Handle other database errors if needed
            throw $e;
        }
    }
}