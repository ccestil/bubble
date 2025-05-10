<section class="dashboard">
    {{-- Revenue Section --}}
    <div class="revenue-section">
        <div class="revenue-header">
            <h3>💰 Revenue</h3>
            <form action="{{ route('admin.dashboard') }}" method="GET">
                <select name="time_period" onchange="this.form.submit()">
                    <option value="month" {{ $timePeriod === 'month' ? 'selected' : '' }}>Monthly</option>
                    <option value="week" {{ $timePeriod === 'week' ? 'selected' : '' }}>Weekly</option>
                    <option value="year" {{ $timePeriod === 'year' ? 'selected' : '' }}>Yearly</option>
                </select>
            </form>
            
        </div>

        <div class="revenue-cards">
            {{-- Revenue Card --}}
            <div class="card revenue-card">
                <h3>{{ ucfirst($timePeriod) }}</h3>
                <h1 class="revenue-total">₱{{ number_format($totalRevenue, 2) }}</h1>
            </div>

            {{-- Breakdown Card --}}
            <div class="card breakdown-card">
                <p><strong>📊 Revenue Breakdown</strong></p>
                <div class="breakdown-row">
                    @foreach($revenueBreakdown as $item)
                        <p>{{ $item['service_name'] }}</p>
                    @endforeach
                </div>

                <div class="breakdown-row amount">
                    @foreach($revenueBreakdown as $item)
                        <h2>{{ number_format($item['total_revenue'], 2) }}</h2>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Metrics Section --}}
    <div class="metrics-section">
        <div class="section-header">
            <h3 class="metric-title-trx">🧾 Transactions</h3>
            <h3 class="metric-title-cus">👥 Customers</h3>
            <h3 class="metric-title-inv">📦 Inventory</h3>
        </div>

        <div class="metrics-grid">
            <div class="card small-card">
                <p class="card-title">Total Transactions</p>
                <h2>{{ $totalTransactions }}</h2>
            </div>
            <div class="card small-card">
                <p class="card-title">Active Transactions</p>
                <h2>{{ $activeTransactions }}</h2>
            </div>
            <div class="card small-card">
                <p class="card-title">Total Customers</p>
                <h2>{{ $totalCustomers }}</h2>
            </div>
            <div class="card small-card">
                <p class="card-title">Daily Average</p>
                <h2>{{ number_format($dailyAverageTransactions, 2) }}</h2>
            </div>

            <div class="card small-card">
                <p class="card-title">Fabric Conditioner</p>
                <h2 class="inline-header">120</h2>
                <p class="inline-p">left</p>
            </div>
            <div class="card small-card">
                <p class="card-title">Detergent Powder</p>
                <h2 class="inline-header">68</h2>
                <p class="inline-p">left</p>
            </div>
        </div>
    </div>
</section>