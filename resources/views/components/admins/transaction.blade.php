<div class="transaction-header">
    <h1 class="transaction-title">🛒 Transactions</h1>
    <div class="total-transactions-inline">
        <span>Total transactions:</span> <strong>62</strong>
    </div>
</div>


    <div class="transaction-list">
        <table>
            <thead>
                <tr>
                    <th>👤 Customer</th>
                    <th>📧 Service</th>
                    <th>💰 Total Amount</th>
                    <th>🔄 Status</th>
                    <th>⚙️ Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="transaction-name">Chris</td>
                    <td>Drop-off</td>
                    <td>200.00</td>
                    <td>Finished</td>
                    <td class="action-buttons">
                        <button class="edit">✏️ Edit</button>
                        <button class="delete">🗑️ Delete</button>
                    </td>
                </tr>
                <!-- Add more employee rows -->
            </tbody>
        </table>
    </div>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
    @endpush

    
</div>
