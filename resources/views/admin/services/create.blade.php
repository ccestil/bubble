<x-shared.layout> {{-- Or your admin layout --}}
    <div class="container">
        <h2>Add New Service</h2>
        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="service_name">Service Name:</label>
                <input type="text" class="form-control" id="service_name" name="service_name" required>
                @error('service_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price_per_kg">Price Per KG:</label>
                <input type="number" class="form-control" id="price_per_kg" name="price_per_kg" step="0.01" required>
                @error('price_per_kg')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Service</button>
        </form>

        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
    </div>
</x-shared.layout>