<!DOCTYPE html>
<html>
<head>
    <title>Receipt - Transaction #{{ $transaction->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin: 20px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .business-info {
            margin-bottom: 10px;
        }
        .transaction-details, .payment-details {
            margin-bottom: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .thank-you {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
        .print-button-container {
            text-align: center;
            margin-top: 20px;
        }
        .print-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 12px; /* Adjust font size for printing */
            }
            .print-button-container {
                display: none; /* Hide the print button when printing */
            }
            /* You can add more print-specific styles here */
        }
    </style>
</head>
<body>
    <div class="receipt-header">
        <h1>{{ $businessName }}</h1>
        <div class="business-info">
            <p>{{ $businessAddress }}</p>
            <p>Tel: {{ $businessPhone }}</p>
        </div>
        <h2>Transaction Receipt</h2>
    </div>

    <div class="transaction-details">
        <p><strong>Transaction ID:</strong> {{ $transaction->id }}</p>
        <p><strong>Customer:</strong> {{ $transaction->customer->user->first_name }} {{ $transaction->customer->user->last_name }}</p>
        <p><strong>Date:</strong> {{ $transaction->created_at->format('Y-m-d H:i:s') }}</p>
        <p><strong>Laundry Status:</strong> {{ $transaction->laundry_status }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Weight (kg)</th>
                <th>Price per kg</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $transaction->service->service_name }}</td>
                <td>{{ $transaction->weight }}</td>
                <td>{{ number_format($transaction->service->price_per_kg, 2) }}</td>
                <td>{{ number_format($transaction->total_amount, 2) }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total">Total Amount:</td>
                <td class="total">{{ number_format($transaction->total_amount, 2) }}</td>
            </tr>
            <tr>
                <td colspan="3" class="total">Payment Method:</td>
                <td class="total">{{ $payment->payment_method }}</td>
            </tr>
            <tr>
                <td colspan="3" class="total">Payment Amount:</td>
                <td class="total">{{ number_format($payment->payment_amount, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="payment-details">
        <p><strong>Payment Time:</strong> {{ $payment->created_at->format('Y-m-d H:i:s') }}</p>
        <p><strong>Processed By:</strong> {{ $transaction->employee->user->first_name }} {{ $transaction->employee->user->last_name }}</p>
    </div>

    <div class="thank-you">
        <p>Thank you for your business!</p>
    </div>

    <div class="print-button-container">
        <button class="print-button" onclick="window.print()">Print Receipt</button>
    </div>

    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</body>
</html>