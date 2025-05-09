<x-admins.layout>
    <div class="employee-form-container">
        <h2>Add New Employee</h2>
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <div class="input-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="input-group">
                <label for="role_task">Role</label>
                <select id="role_task" name="role_task" required>
                    <option value="Employee">Employee</option>
                    <option value="Owner">Owner</option>
                </select>
                @error('role_task')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="input-group">
                <label for="work_shift">Work Shift</label>
                <input type="time" id="work_shift" name="work_shift" required>
                @error('work_shift')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="create-account-button">Create Employee</button>
        </form>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/create-employee.css') }}">
    @endpush

</x-admins.layout>
