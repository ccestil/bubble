<div class="customer-header">
    <h1 class="customer-title">👥 Customers</h1>
    <div class="total-customers-inline">
        <span>Total Customers:</span> <strong>{{ $totalCustomers }}</strong>
    </div>
</div>

<div class="customer-list">
    <table>
        <thead>
            <tr>
                <th>👤 Name</th>
                <th>📧 Email</th>
                <th>📱 Phone</th>
                <th>🧺 Active Laundry</th>
                <th>⚙️ Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td class="customer-name">{{ $customer->user->first_name }} {{ $customer->user->last_name }}</td>
                    <td>{{ $customer->user->email }}</td>
                    <td>{{ $customer->user->phone }}</td>
                    <td>{{ $customer->transactions->count() }}</td>
                    {{-- <td class="action-buttons">
                        <a href="{{ route('customers.edit', $customer->id) }}" class="edit btn btn-primary btn-sm">✏️ Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete btn btn-danger btn-sm">🗑️ Delete</button>
                        </form>
                    </td> --}}
                </tr>
            @empty
                <tr>
                    <td colspan="5">No customers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endpush
