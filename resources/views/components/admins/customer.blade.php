<div class="customer-header">
    <h1 class="customer-title">👥 Customers</h1>
    <div class="total-customers-inline">
        <span>Total Customers:</span> <strong>{{ $totalCustomers }}</strong>
    </div>
</div>

<div class="customer-list">
    <table>
        <thead>
            <tr>
                <th>
                    <a href="{{ route('admin.customers', ['sort' => 'name', 'direction' => $sortDirectionName]) }}">
                        👤 Name 
                        @if ($sortField == 'name')
                            @if ($sortDirectionName == 'asc')
                                ⬆️
                            @else
                                ⬇️
                            @endif
                        @endif
                    </a>
                </th>
                <th>📧 Email</th>
                <th>📱 Phone</th>
                <th>
                    <a href="{{ route('admin.customers', ['sort' => 'created_at', 'direction' => $sortDirectionCreated]) }}">
                        Registration Date
                        @if ($sortField == 'created_at')
                            @if ($sortDirectionCreated == 'asc')
                                ⬆️
                            @else
                                ⬇️
                            @endif
                        @endif
                    </a>
                </th>
                <th>🧺 Active Laundry</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td class="customer-name">{{ $customer->user->first_name }} {{ $customer->user->last_name }}</td>
                    <td>{{ $customer->user->email }}</td>
                    <td>{{ $customer->user->phone }}</td>
                    <td>{{ $customer->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $customer->transactions->count() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No customers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
<style>
    /* Style for the sorting arrows */
    .emoji {
        margin-left: 5px; 
        font-size: 1.2em; 
    }
    th a {
        display: flex;
        align-items: center;
        text-decoration: none; 
        color: inherit; 
    }
    th a:hover {
       color: #007bff;
    }
</style>
@endpush
