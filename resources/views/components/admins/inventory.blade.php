<div class="inventory-header">
    <h3 class="inventory-title">📦 Inventory</h3>
    <button class="add-inventory-button">➕ Stock In</button>
</div>



    <div class="inventory-list">
        <table>
            <thead>
                <tr>
                    <th><span>👤</span> <span>Name</span></th>
                    <th><span>📧</span> <span>Description</span></th>
                    <th><span>🏷️</span> <span>Price</span></th>
                    <th><span>📦</span> <span>Stock</span></th>
                    <th><span>⚙️</span> <span>Action</span></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="inventory-name">Downy</td>
                    <td>Fabric conditioner</td>
                    <td>20.00</td>
                    <td>120</td>
                    <td class="action-buttons">
                        <button class="edit">✏️ Edit</button>
                        <button class="delete">🗑️ Delete</button>
                    </td>
                </tr>
                <!-- Add more employee rows -->
            </tbody>
        </table>
    </div>


    
    <div class="inventory-log-header">
        <p class="inventory-title logs">📝 Logs</p>
    </div>
    
    <div class="inventory-list">
        <table>
            <thead>
                <tr>
                    <th><span>📦</span> <span>Product Name</span></th>
                    <th><span>👤</span> <span>Employee</span></th>
                    <th><span>🔢</span> <span>Before Stock</span></th>
                    <th><span>➕➖</span> <span>Qty Changed</span></th>
                    <th><span>✅</span> <span>After Stock</span></th>
                    <th><span>🕒</span> <span>DateTime</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Downy</td>
                    <td>Juan Dela Cruz</td>
                    <td>100</td>
                    <td>+20</td> <!-- Positive = stock in -->
                    <td>120</td>
                    <td>2025-05-03 14:30</td>
                </tr>
                <tr>
                    <td>Downy</td>
                    <td>Maria Santos</td>
                    <td>120</td>
                    <td>-10</td> <!-- Negative = stock out -->
                    <td>110</td>
                    <td>2025-05-03 18:45</td>
                </tr>
                <!-- More log rows -->
            </tbody>
        </table>
    </div>
    
    

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/inventory.css') }}">
    @endpush

    
</div>
