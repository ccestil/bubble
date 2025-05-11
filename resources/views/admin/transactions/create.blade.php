<x-admins.layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/create-transaction.css') }}">
    @endpush

    <div class="create-transaction-container mt-4">
        <h2 class="mb-4 text-center">Create New Transaction</h2>
        <form action="{{ route('transactions.store') }}" method="POST" class="transaction-form">
            @csrf

            <div class="form-group">
                <label for="customer_search" class="form-label">Search Customer:</label>
                <input type="text" class="form-control" id="customer_search" placeholder="Enter customer name"
                    onkeyup="filterCustomers()">
            </div>

            <div class="form-group">
                <label for="customer_id" class="form-label">Customer:</label>
                <select class="form-select" id="customer_id" name="customer_id" required>
                    <option value="">Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer['id'] }}" data-name="{{ $customer['text'] }}">
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
                    @foreach ($services as $id => $serviceName)
                        <option value="{{ $id }}">{{ $serviceName }}</option>
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
                    @foreach ($employees as $id => $employeeName)
                        <option value="{{ $id }}">{{ $employeeName }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="weight" class="form-label">Weight (KG):</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" required>
                @error('weight')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="display: none;">
                <label for="laundry_status" class="form-label">Laundry Status:</label>
                <input type="text" class="form-control" id="laundry_status" name="laundry_status" value="Washing" readonly>
            </div>

            <div class="form-group">
                <label for="payment_status" class="form-label">Payment Status:</label>
                <select class="form-select" id="payment_status" name="payment_status" required>
                    <option value="Unpaid" selected>Unpaid</option>
                    <option value="Paid">Paid</option>
                </select>
                @error('payment_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.transaction') }}" class="btn btn-secondary">Back to Transactions</a>
                <button type="submit" class="btn btn-primary">Create Transaction</button>
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