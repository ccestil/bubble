<div class="invetory-header">
    <h3 class="inventory-title">📦 Inventory</h3>
</div>


    <div class="inventory-list">
        <table>
            <thead>
                <tr>
                    <th><span>👤</span> <span>Name</span></th>
                    <th><span>📧</span> <span>Description</span></th>
                    <th><span>⏰</span> <span>Supplier</span></th>
                    <th><span>🏷️</span> <span>Price</span></th>
                    <th><span>📦</span> <span>Stock</span></th>
                    <th><span>⚙️</span> <span>Action</span></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="inventory-name">Downy</td>
                    <td>Fabric conditioner</td>
                    <td>Triple A</td>
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

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/inventory.css') }}">
    @endpush

    
</div>
