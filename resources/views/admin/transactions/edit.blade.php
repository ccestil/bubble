<x-admins.layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/create-transaction.css') }}">
    @endpush

    <div class="container create-transaction-container mt-4">
        <h2 class="mb-4 text-primary fw-semibold text-center">Edit Transaction</h2>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="transaction-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="customer_search" class="form-label">Search Customer:</label>
                <input type="text" class="form-control" id="customer_search"
                    placeholder="Enter customer name" onkeyup="filterCustomers()">
            </div>

            <div class="form-group">
                <label for="customer_id" class="form-label">Customer:</label>
                <select class="form-select" id="customer_id" name="customer_id" required>
                    <option value="">Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer['id'] }}" data-name="{{ $customer['text'] }}"
                            {{ $transaction->customer_id == $customer['id'] ? 'selected' : '' }}>
                            {{ $customer['text'] }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="service_id" class="form-label">Service:</label>
                <select class="form-select" id="service_id" name="service_id" required>
                    <option value="">Select Service</option>
                    @foreach ($services as $id => $name)
                        <option value="{{ $id }}" {{ $transaction->service_id == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="employee_id" class="form-label">Employee:</label>
                <select class="form-select" id="employee_id" name="employee_id" required>
                    <option value="">Select Employee</option>
                    @foreach ($employees as $id => $name)
                        <option value="{{ $id }}" {{ $transaction->employee_id == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('employee_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="weight" class="form-label">Weight (in KG):</label>
                <input type="number" class="form-control" id="weight" name="weight" step="0.01"
                    placeholder="e.g., 2.5" value="{{ $transaction->weight }}" required>
                @error('weight')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="laundry_status" class="form-label">Laundry Status:</label>
                <select class="form-select" id="laundry_status" name="laundry_status" required>
                    <option value="">Select Status</option>
                    <option value="Washing" {{ $transaction->laundry_status == 'Washing' ? 'selected' : '' }}>
                        Washing</option>
                    <option value="Drying" {{ $transaction->laundry_status == 'Drying' ? 'selected' : '' }}>Drying
                    </option>
                    <option value="Ready for Pickup"
                        {{ $transaction->laundry_status == 'Ready for Pickup' ? 'selected' : '' }}>Ready for Pickup
                    </option>
                    <option value="Completed" {{ $transaction->laundry_status == 'Completed' ? 'selected' : '' }}>
                        Completed</option>
                </select>
                @error('laundry_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="payment_status" class="form-label">Payment Status:</label>
                <select class="form-select" id="payment_status" name="payment_status" required>
                    <option value="">Select Status</option>
                    <option value="Unpaid" {{ $transaction->payment_status == 'Unpaid' ? 'selected' : '' }}>Unpaid
                    </option>
                    <option value="Paid" {{ $transaction->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                </select>
                @error('payment_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.transaction') }}" class="btn btn-secondary">Back to Transactions</a>
                <button type="submit" class="btn btn-primary">Update Transaction</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            function filterCustomers() {
                var input, filter, select, option, i, txtValue;
                input = document.getElementById("customer_search");
                filter = input.value.toUpperCase();
                select = document.getElementById("customer_id");
                option = select.getElementsByTagName("option");
                for (i = 0; i < option.length; i++) {
                    txtValue = option[i].getAttribute("data-name");
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        option[i].style.display = "";
                    } else {
                        option[i].style.display = "none";
                    }
                }
            }
        </script>
    @endpush
</x-admins.layout>