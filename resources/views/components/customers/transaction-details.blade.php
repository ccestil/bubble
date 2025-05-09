<div>
    <h3>Transaction Details</h3>
    <p><strong>Service:</strong> {{ $transaction->service->name ?? 'N/A' }}</p>
    <p><strong>Total Amount:</strong> {{ $transaction->total_amount }}</p>
    <p><strong>Laundry Status:</strong> {{ $transaction->laundry_status }}</p>
    <p><strong>Payment Status:</strong> {{ $transaction->payment_status }}</p>
    <a href="{{ route('customer.index') }}" class="btn btn-secondary mt-4">Back to Dashboard</a>
</div