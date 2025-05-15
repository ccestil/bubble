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
                <div style="display: flex; align-items:baseline; justify-content: space-between">
                    <h1 class="revenue-total" style="margin-right: 10px;">₱{{ number_format($totalRevenue, 2) }}</h1>
                    <div style="width: 150px; height: 50px;">
                        <canvas id="revenueChart" ></canvas>
                    </div>
                </div>
            </div>

            {{-- Breakdown Card --}}
            <div class="card breakdown-card">
                <p class="widget-header">📊 Revenue Breakdown</p>
                <div class="breakdown-row">
                    @foreach ($revenueBreakdown as $item)
                        <p>{{ $item['service_name'] }}</p>
                    @endforeach
                </div>

                <div class="breakdown-row amount">
                    @foreach ($revenueBreakdown as $item)
                        <h2 class="widget-value">
                            {{ number_format($item['total_revenue'] ?? 0, 2) }}
                        </h2>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="overall-analytics">
        <div class="transactions-section">
            <div class="widget-header">
                <i class="fas fa-chart-line"></i>📈 Transactions
            </div>
            <div class="widget-card">
                <div class="widget-title">Total Transactions</div>
                <div class="widget-value">
                    <h2>{{ $totalTransactions }}</h2>

                </div>
            </div>
            <div class="widget-card">
                <div class="widget-title">Active Transactions</div>
                <div class="widget-value">
                    <h2>{{ $activeTransactions }}</h2>

                </div>
            </div>
        </div>

        <div class="customers-section">
            <div class="widget-header">
                <i class="fas fa-users"></i>👥 Customers
            </div>
            <div class="widget-card">
                <div class="widget-title">Total Customers</div>
                <div class="widget-value">
                    <h2>{{ $totalCustomers }}</h2>
                </div>
            </div>
            <div class="widget-card">
                <div class="widget-title">Daily Average</div>
                <div class="widget-value">
                    <h2>{{ number_format($dailyAverageTransactions, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class=\"card small-card\">
                <p class=\"card-title\">Fabric Conditioner</p>
                <h2 class=\"inline-header\">120</h2>
                <p class=\"inline-p\">left</p>
            </div>
            <div class=\"card small-card\">
                <p class=\"card-title\">Detergent Powder</p>
                <h2 class=\"inline-header\">68</h2>
                <p class=\"inline-p\">left</p> --}}
    </div>
    </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueData = {
        labels: [
            @foreach ($revenueBreakdown as $item)
                "{{ $item['service_name'] }}",
            @endforeach
        ],
        datasets: [{
            label: 'Revenue',
            data: [
                @foreach ($revenueBreakdown as $item)
                    {{ $item['total_revenue'] }},
                @endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    };

    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: revenueData,
        options: {
            responsive: true,
            maintainAspectRatio: false, // Add this line
            plugins: {
                legend: {
                    display: false,
                },
            },
            scales: {
                x: {
                    display: false, // Remove x-axis labels
                },
                y: {
                    display: false, // Remove y-axis labels
                    beginAtZero: true
                }
            }
        }
    });
</script>
