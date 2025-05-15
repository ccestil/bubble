<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    
    
    <title>Receipt - Transaction #{{ $transaction->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin: 20px;
            max-width: 720px;
            margin: 0px auto;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;

        }
        .receipt-header h1 {
                font-family: "Fredoka", sans-serif;
                color: #2a5286c4;

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
            margin-block: 50px;
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

        .back-button-container {
        text-align: center;
        margin-block: 20px;
        font-weight: 500;
    }

    .back-button {
        padding: 10px 20px;
        background-color: white; /* Blue */
        color: #2a5286c4;
        border: solid 2px #2a5286c4;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none; /* Remove underline */
    }

    .back-button:hover {
        background-color: #2779bd;
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

    <div class="back-button-container">
        <a href="{{ route('admin.transaction') }}" class="back-button">Back to Transactions</a>
    </div>

    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</body>
</html>