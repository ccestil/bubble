<h3>Welcome back, {{ $user->first_name }}!</h3>

<h2 class="transaction-subtitle">🧺 My Laundry</h2>

<div class="transaction-list">
    <table>
        <thead>
            <tr>
                <th>📧 Service</th>
                <th>💰 Total Amount</th>
                <th>Laundry Status</th>
                <th>Payment Status</th>
                <th>⚙️ Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customer->transactions as $transaction)
                <tr>
                    <td data-label="Service">{{ $transaction->service->service_name ?? 'N/A' }}</td>
                    <td data-label="Total Amount">{{ $transaction->total_amount }}</td>
                    <td data-label="Laundry Status">{{ $transaction->laundry_status }}</td>
                    <td data-label="Payment Status">{{ $transaction->payment_status }}</td>
                    <td data-label="Action">
                        <a href="{{ route('customer.transactions.show', $transaction->id) }}" class="btn btn-primary btn-sm">👁️ View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No transactions found.</td>
                </tr>
            @endforelse
        </tbody>
        
    </table>

    <h2>⏰ History
        <a href="/customer/history" class="btn btn-secondary btn-sm">View</a>
    </h2>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/customer-dashboard.css') }}">
    @endpush
</div>


