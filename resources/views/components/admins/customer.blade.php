@push('styles')
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endpush

<div class="container">
    <div class="card">
        <h3>👥 Customers</h3>
        <p class="subtext">Total customers</p>
        <p class="total">62</p>
    </div>

    <div class="card">
        <h3>Customer List</h3>
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
                    <td data-label="Name">Chris Estil</td>
                    <td data-label="Email">chirs@gmail.com</td>
                    <td data-label="Phone">0909090909</td>
                    <td data-label="Active Laundry">1</td>
                    <td data-label="Action">
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
