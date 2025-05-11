<x-admins.layout>
    <div class="employee-form-container">
        <h2>{{ isset($service) ? 'Edit Service' : 'Add New Service' }}</h2>
        <form action="{{ isset($service) ? route('admin.services.update', $service->id) : route('services.store') }}"
            method="POST">
            @csrf
            @if (isset($service))
                @method('PUT')
            @endif

            <div class="input-group">
                <label for="service_name">Service Name</label>
                <input type="text" class="input-group" id="service_name" name="service_name"
                    value="{{ isset($service) ? $service->service_name : old('service_name') }}" required>
                @error('service_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="price_per_kg">Price per KG</label>
                <input type="number" step="0.01" class="form-control" id="price_per_kg" name="price_per_kg"
                    value="{{ isset($service) ? $service->price_per_kg : old('price_per_kg') }}" required>
                @error('price_per_kg')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="create-account-button">{{ isset($service) ? 'Update Service' : 'Save Service' }}</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/create-employee.css') }}">
    @endpush
</x-admins.layout>
