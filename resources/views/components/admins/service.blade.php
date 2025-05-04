<div class="service-header">
    <h3 class="service-title">🫧 Services</h3>
    <a href="{{ route('services.create') }}">Add New Service</a>
</div>
 

    <div class="service-list">
        <table>
            <thead>
                <tr>
                    <th>👤 Name</th>
                    <th>📧 Description</th>
                    <th>⏰ Supplier</th>
                    <th>🏷️ Price</th>
                    <th>📦 Stock</th>
                    <th>⚙️ Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service-name">Downy</td>
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
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    @endpush

    
</div>
