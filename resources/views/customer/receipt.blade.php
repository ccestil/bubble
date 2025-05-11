<x-customers.layout>
    <div class="card">
        <div class="card-title">
            <h2>Transaction Receipt</h2>
        </div>

        <div class="card-text">
            <p><strong>Transaction ID:</strong> <span>{{ $transaction->id }}</span></p>
            <p><strong>Customer:</strong> <span>{{ $transaction->customer->user->first_name }} {{ $transaction->customer->user->last_name }}</span></p>
            <p><strong>Date:</strong> <span>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</span></p>
            <p><strong>Service:</strong> <span>{{ $transaction->service->service_name ?? 'N/A' }}</span></p>
            <p><strong>Total Amount:</strong> <span>{{ $transaction->total_amount }}</span></p>
            <p><strong>Laundry Status:</strong> <span>{{ $transaction->laundry_status }}</span></p>
            
        </div>

        <div class="back-button-container">
            <a href="{{ route('customer.index') }}" class="back-button">Back to My Laundry</a>
        </div>

    </div>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/customer-receipt.css') }}">
        @endpush
</x-customers.layout>