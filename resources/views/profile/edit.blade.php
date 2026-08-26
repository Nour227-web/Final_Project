@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

<style>
    .profile-hero {
        background-color: #1c1f2b;
        padding-top: 60px;
        padding-bottom: 90px;
    }

    .edit-profile-card {
        border-radius: 16px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-top: -60px;
        overflow: hidden;
    }

    .profile-header {
        background-color: white;
        padding: 25px 30px;
        border-bottom: 1px solid #eee;
    }

    .profile-body {
        padding: 35px;
    }

    .profile-icon {
        width: 90px;
        height: 90px;
        background-color: #0d6efd;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        font-weight: bold;
        margin: -75px auto 25px;
        position: relative;
        border: 5px solid white;
    }

    .form-label {
        font-weight: 600;
        color: #1c1f2b;
    }

    .form-control {
        border-radius: 8px;
        padding: 11px 14px;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .15);
    }

    .form-section {
        background-color: #f8f9fa;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #1c1f2b;
    }

    .password-note {
        font-size: 13px;
        color: #6c757d;
        margin-top: 6px;
    }

    .btn {
        border-radius: 8px;
        padding: 9px 20px;
    }
</style>

{{-- Hero --}}
<div class="profile-hero text-center text-light">
    <h1 class="fw-bold">Edit Profile</h1>
    <p class="text-white-50 mb-0">
        Update your personal information
    </p>
</div>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card edit-profile-card">

                {{-- Header --}}
                <div class="profile-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        Profile Settings
                    </h5>

                    <a href="{{ route('profile.show') }}"
                       class="btn btn-secondary btn-sm">
                        Back to Profile
                    </a>
                </div>

                <div class="profile-body">

                    {{-- Avatar --}}
                    <div class="profile-icon">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        {{-- Personal Information --}}
                        <div class="form-section">

                            <div class="section-title">
                                Personal Information
                            </div>

                            {{-- Name --}}
                            <div class="mb-4">
                                <label for="name" class="form-label">
                                    Name
                                </label>

                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                    autofocus
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-2">
                                <label for="email" class="form-label">
                                    Email Address
                                </label>

                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    required
                                >

                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                        </div>

                        {{-- Password --}}
                        <div class="form-section">

                            <div class="section-title">
                                Change Password
                            </div>

                            <p class="text-muted small mb-4">
                                Leave the password fields empty if you don't want to change your password.
                            </p>

                            {{-- New Password --}}
                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    New Password
                                </label>

                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    autocomplete="new-password"
                                >

                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-2">
                                <label for="password-confirm" class="form-label">
                                    Confirm New Password
                                </label>

                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    autocomplete="new-password"
                                >
                            </div>

                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a
                                href="{{ route('profile.show') }}"
                                class="btn btn-secondary"
                            >
                                Cancel
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection