<div class="service-header">
    <h3 class="service-title">🫧 Services</h3>

    @if (session('success'))
        <div class="alert alert-success" style="color: green;">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" style="color: red;">{{ session('error') }}</div>
    @endif

    <a id="add-service" href="{{ route('services.create') }}">➕ Add Service</a>
</div>


<div class="service-list">
    <table>
        <thead>
            <tr>
                <th>👤 Name</th>
                <th>🏷️ Price</th>
                <th>⚙️ Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td class="service-name">{{ $service->service_name }}</td>
                    <td>{{ number_format($service->price_per_kg, 2) }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('services.edit', $service->id) }}" class="edit btn btn-primary btn-sm"
                            title="Edit">✏️</a>
                        <form action="{{ route('services.delete', $service->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this service? This cannot be undone.')" title="Delete">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No services found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
@endpush
