<div class="customer-container">
    <div class="customer-header">
        <h1>Customers</h1>
        <div class="total-customers">
            <p>Total Customers</p>
            <p>62</p>
        </div>
    </div>

    <button class="add-customer-button">Add Customer</button>

    <div class="customer-list">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Active Laundry</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="customer-name">Chris Estil</td>
                    <td>chris@gmail.com</td>
                    <td>0909090909</td>
                    <td>1</td>
                    <td class="action-buttons">
                        <button class="edit">Edit</button>
                        <button class="delete">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows -->
            </tbody>
        </table>
    </div>
    @push('styles')
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endpush
    <div class="empty-state">
        No customers found.
    </div>
</div>

