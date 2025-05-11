<div class="employee-header">
    <h3 class="employee-title">🧍 Employees</h3>
    <div class="total-employees-inline">
        <span>Total Employees:</span>
        @isset($employees)
            <strong>{{ count($employees) }}</strong>
        @else
            <strong>0</strong>
        @endisset
    </div>

    <a href="{{ route('employees.create') }}" id="add-service">➕ Add Employee</a>
</div>

<div class="employee-list">
    <table>
        <thead>
            <tr>
                <th>👤 Name</th>
                <th>📧 Email</th>
                <th>📞 Phone</th>
                <th>⏰ Schedule</th>
                <th>🎓 Role</th>
                <th>⚙️ Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td class="employee-name">{{ $employee->user->first_name }} {{ $employee->user->last_name }}</td>
                    <td>{{ $employee->user->email }}</td>
                    <td>{{ $employee->user->phone }}</td>
                    <td>{{ $employee->work_shift }}</td>
                    <td>{{ $employee->role_task }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('employees.edit', $employee) }}" class="edit btn btn-primary btn-sm" title="Edit">✏️</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this employee? This cannot be undone.')" title="Delete">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No employees found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
@endpush
