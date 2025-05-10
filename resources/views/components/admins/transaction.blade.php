<div class="transaction-header">
    <h1 class="transaction-title">🛒 Transactions</h1>
    <div class="total-transactions-inline">
        <span>Total transactions:</span> <strong>{{ $totalTransactions }}</strong>
    </div>
    {{-- <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transaction</a> --}}
</div>

<div class="transaction-list">
    <table>
        <thead>
            <tr>
                <th>👤 Customer</th>
                <th>📧 Service</th>
                <th>⚖️ Weight</th>
                <th>💰 Total Amount</th>
                <th>🧺 Laundry Status</th>
                <th>💸 Payment Status</th>
                <th>⚙️ Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <td class="transaction-name">
                        {{ $transaction->customer->user->first_name }} {{ $transaction->customer->user->last_name }}
                    </td>
                    <td>{{ $transaction->service->service_name }}</td>
                    <td>{{ number_format($transaction->weight, 2) }} KG</td>
                    <td>{{ number_format($transaction->total_amount, 2) }}</td>
                    <td>{{ $transaction->laundry_status }}</td>
                    <td>{{ $transaction->payment_status }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('transactions.edit', $transaction->id) }}"
                           class="edit btn btn-sm" title="Edit">✏️</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete btn btn-sm" title="Delete">🗑️</button>
                        </form>
                        @if ($transaction->payment_status === 'Unpaid')
                            <a href="{{ route('admin.transactions.pay', $transaction) }}"
                               class="btn btn-sm btn-success" title="Process Payment">💰</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No transactions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
@endpush
