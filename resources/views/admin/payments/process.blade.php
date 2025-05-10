<x-admins.layout>
    <h2>Process Payment for Transaction #{{ $transaction->id }}</h2>

    <form action="{{ route('admin.transactions.process-payment', $transaction) }}" method="POST">
        @csrf

        <div>
            <label for="payment_amount">Payment Amount:</label>
            <input type="number" name="payment_amount" id="payment_amount" class="form-control"
                value="{{ $transaction->total_amount }}" required readonly>
            @error('payment_amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="Cash" selected>Cash</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Mobile Payment">Mobile Payment</option>
                </select>
            @error('payment_method')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="employee_id">Employee:</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                @if ($currentShiftEmployees->count() == 1)
                    <option value="{{ $currentShiftEmployees->first()->id }}" selected>
                        {{ $currentShiftEmployees->first()->user->first_name }}
                        {{ $currentShiftEmployees->first()->user->last_name }}</option>
                @else
                    <option value="" disabled selected>Select Employee</option>
                    @foreach ($currentShiftEmployees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->user->first_name }} {{ $employee->user->last_name }}</option>
                    @endforeach
                @endif
            </select>
            @error('employee_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Process Payment</button>
        <a href="{{ route('admin.transaction') }}" class="btn btn-secondary">Cancel</a>
    </form>
</x-admins.layout>