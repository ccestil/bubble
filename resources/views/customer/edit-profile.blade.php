<x-customers.layout>
    <div class="container edit-profile-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card edit-profile-card">
                    <div class="card-header edit-profile-card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body edit-profile-card-body">
                        <form method="POST" action="{{ route('customer.profile.update') }}">
                            @csrf
                            @method('PUT')

                            {{-- First Name --}}
                            <div class="row mb-4 align-items-center">
                                <label for="first_name" class="col-md-4 text-md-end form-label">
                                    {{ __('First Name') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        name="first_name"
                                        value="{{ old('first_name', Auth::user()->first_name) }}"
                                        required autofocus>

                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Last Name --}}
                            <div class="row mb-4 align-items-center">
                                <label for="last_name" class="col-md-4 text-md-end form-label">
                                    {{ __('Last Name') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name"
                                        value="{{ old('last_name', Auth::user()->last_name) }}"
                                        required>

                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="row mb-4 align-items-center">
                                <label for="email" class="col-md-4 text-md-end form-label">
                                    {{ __('Email Address') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email', Auth::user()->email) }}"
                                        required>

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone Number --}}
                            <div class="row mb-4 align-items-center">
                                <label for="phone" class="col-md-4 text-md-end form-label">
                                    {{ __('Phone Number') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        name="phone"
                                        value="{{ old('phone', Auth::user()->phone) }}">

                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                    <a href="{{ route('customer.index') }}" class="btn btn-secondary ms-2">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
    @endpush
</x-customers.layout>
