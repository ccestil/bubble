<x-customers.layout>
    <div class="container mt-5">
        <h2>Transaction Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Transaction ID: {{ $transaction->id }}</h5>
                <p class="card-text"><strong>Service:</strong> {{ $transaction->service->service_name ?? 'N/A' }}</p>
                <p class="card-text"><strong>Total Amount:</strong> {{ $transaction->total_amount }}</p>
                <p class="card-text"><strong>Laundry Status:</strong> {{ $transaction->laundry_status }}</p>
                <p class="card-text"><strong>Payment Status:</strong> {{ $transaction->payment_status }}</p>
                <p class="card-text"><strong>Transaction Date:</strong> {{ $transaction->created_at }}</p>
                <p class="card-text"><strong>Updated At:</strong> {{ $transaction->updated_at }}</p>

                <a href="{{ route('customer.index') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/customer-dashboard.css') }}">
        @endpush
</x-customers.layout>