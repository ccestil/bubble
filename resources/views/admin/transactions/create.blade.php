<x-admins.layout> {{-- Or your admin layout --}}
    <div class="container">
        <h2>Create New Transaction</h2>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="customer_search">Search Customer:</label>
                <input type="text" class="form-control" id="customer_search" onkeyup="filterCustomers()">
            </div>

            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <select class="form-control" id="customer_id" name="customer_id" required>
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer['id'] }}" data-name="{{ $customer['text'] }}">{{ $customer['text'] }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="service_id">Service:</label>
                <select class="form-control" id="service_id" name="service_id" required>
                    <option value="">Select Service</option>
                    @foreach($services as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="employee_id">Employee:</label>
                <select class="form-control" id="employee_id" name="employee_id" required>
                    <option value="">Select Employee</option>
                    @foreach($employees as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="weight">Weight (in KG):</label>
                <input type="number" class="form-control" id="weight" name="weight" step="0.01" required>
                @error('weight')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="payment_status">Payment Status:</label>
                <select class="form-control" id="payment_status" name="payment_status" required>
                    <option value="">Select Status</option>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="partially_paid">Partially Paid</option>
                </select>
                @error('payment_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <button type="submit" class="btn btn-primary">Create Transaction</button>
        </form>

        <a href="/transactions" class="btn btn-secondary mt-3">Back to Transactions</a>
    </div>

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
</x-admins.layout>