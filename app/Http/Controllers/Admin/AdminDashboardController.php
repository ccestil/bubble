<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // ... (other code remains the same)
        // 1. Total Transactions
        $totalTransactions = Transaction::count();

        // 2. Active Transactions
        $activeTransactions = Transaction::where('laundry_status', '!=', 'completed')->count(); // Adjust status as needed

        // 3. Total Customers
        $totalCustomers = Customer::count();

        // 4. Daily Average Transactions (for the current month)
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth();
        $endOfMonth = $now->endOfMonth();
        $daysInMonth = $now->daysInMonth;
        $totalTransactionsThisMonth = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $dailyAverageTransactions = $daysInMonth > 0 ? round($totalTransactionsThisMonth / $daysInMonth, 2) : 0;

        // 5. Revenue Calculations
        $timePeriod = $request->input('time_period', 'month');
        $revenueQuery = Payment::query()
            ->join('transactions', 'payments.transaction_id', '=', 'transactions.id')
            ->where('transactions.payment_status', 'Paid'); // Only include payments for 'Paid' transactions

        switch ($timePeriod) {
            case 'week':
                $revenueQuery->whereBetween('payments.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'year':
                $revenueQuery->whereYear(DB::raw('DATE(payments.created_at)'), Carbon::now()->year);
                break;
            default: // 'month'
                $revenueQuery->whereMonth('payments.created_at', Carbon::now()->month)
                             ->whereYear(DB::raw('DATE(payments.created_at)'), Carbon::now()->year);
                break;
        }

        $totalRevenue = $revenueQuery->sum('payments.payment_amount');// Use payment_amount

        // 6. Revenue Breakdown (Corrected)
        $revenueBreakdown = Transaction::select('services.service_name', DB::raw('SUM(payments.payment_amount) as total_revenue'))
            ->join('payments', 'transactions.id', '=', 'payments.transaction_id')
            ->join('services', 'transactions.service_id', '=', 'services.id') // Corrected join
            ->where('transactions.payment_status', 'Paid') // Only include 'Paid' transactions
            ->groupBy('services.service_name')
            ->get()
            ->toArray();

        $viewData = [
            'totalTransactions' => $totalTransactions,
            'activeTransactions' => $activeTransactions,
            'totalCustomers' => $totalCustomers,
            'dailyAverageTransactions' => $dailyAverageTransactions,
            'totalRevenue' => $totalRevenue,
            'revenueBreakdown' => $revenueBreakdown,
            'timePeriod' => $timePeriod,
        ];

        return view('admin.dashboard', $viewData);
    }
}
