<section class="dashboard">
    {{-- Revenue Section --}}
    <div class="revenue-section">
        <div class="revenue-header">
            <h3>💰 Revenue</h3>
            <select>
                <option>Monthly</option>
                <option>Weekly</option>
                <option>Yearly</option>
            </select>
        </div>

        <div class="revenue-cards">
            {{-- Revenue Card --}}
            <div class="card revenue-card">
                <h3>May</h3>
                <h1 class="revenue-total">₱15,000.00</h1>
            </div>

            {{-- Breakdown Card --}}
            <div class="card breakdown-card">
                <p><strong>📊 Revenue Breakdown</strong></p>
                <div class="breakdown-row">
                    <p>📦 Drop-off</p>
                    <p>🧺 Self-service</p>
                    <p>🛒 Products</p>
                </div>

                <div class="breakdown-row amount">
                    <h2>9000.00</h2>
                    <h2>9000.00</h2>
                    <h2>9000.00</h2>
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
                <h2 >425</h2>
            </div>
            <div class="card small-card">
                <p class="card-title">Active Transactions</p>
                <h2>32</h2>
            </div>
            <div class="card small-card">
                <p class="card-title">Total Customers</p>
                <h2>62</h2>
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

            <div class="card small-card">
                <p class="card-title">Daily Average</p>
                <h2>68</h2>
            </div>
        </div>
    </div>
</section>
