<x-admins.layout>
    <div class="employee-form-container">
        <h2>{{ isset($employee) ? 'Edit Employee' : 'Add New Employee' }}</h2>
        <form method="POST" action="{{ isset($employee) ? route('employees.update', $employee) : route('employees.store') }}">
            @csrf
            @if(isset($employee))
                @method('PUT')
            @endif

            <div class="input-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name', isset($employee) ? $employee->user->first_name : '') }}" required>
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', isset($employee) ? $employee->user->last_name : '') }}" required>
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', isset($employee) ? $employee->user->email : '') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', isset($employee) ? $employee->user->phone : '') }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="role_task">Role</label>
                <select id="role_task" name="role_task" required>
                    <option value="Employee" {{ old('role_task', isset($employee) ? $employee->role_task : '') === 'Employee' ? 'selected' : '' }}>Employee</option>
                    <option value="Owner" {{ old('role_task', isset($employee) ? $employee->role_task : '') === 'Owner' ? 'selected' : '' }}>Owner</option>
                </select>
                @error('role_task')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="work_shift">Work Shift</label>
                <input type="time" id="work_shift" name="work_shift" value="{{ old('work_shift', isset($employee) ? $employee->work_shift : '') }}" required>
                @error('work_shift')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="create-account-button">
                {{ isset($employee) ? 'Update Employee' : 'Create Employee' }}
            </button>
        </form>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/create-employee.css') }}">
    @endpush

</x-admins.layout>