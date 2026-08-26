@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<style>
    .profile-hero {
        background-color: #1c1f2b;
        padding-top: 60px;
        padding-bottom: 90px;
    }

    .profile-card {
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
        padding: 30px;
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
        margin: -70px auto 20px;
        position: relative;
        border: 5px solid white;
    }

    .profile-name {
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 5px;
    }

    .profile-email {
        text-align: center;
        color: #6c757d;
        margin-bottom: 30px;
    }

    .profile-info {
        background-color: #f8f9fa;
        border-radius: 12px;
        padding: 18px 20px;
        margin-bottom: 15px;
    }

    .profile-label {
        color: #6c757d;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: .05em;
        margin-bottom: 5px;
    }

    .profile-value {
        font-size: 17px;
        font-weight: 600;
        color: #1c1f2b;
    }

    .edit-btn {
        border-radius: 8px;
        padding: 8px 18px;
    }
</style>

{{-- Hero --}}
<div class="profile-hero text-center text-light">
    <h1 class="fw-bold">My Profile</h1>
    <p class="text-white-50 mb-0">
        View and manage your personal information
    </p>
</div>

{{-- Profile Card --}}
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card profile-card">

                {{-- Header --}}
                <div class="profile-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Profile Information</h5>

                    <a href="{{ route('profile.edit') }}"
                       class="btn btn-primary btn-sm edit-btn">
                        Edit Profile
                    </a>
                </div>

                {{-- Body --}}
                <div class="profile-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Avatar --}}
                    <div class="profile-icon">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    {{-- Name --}}
                    <div class="profile-name">
                        {{ $user->name }}
                    </div>

                    {{-- Email --}}
                    <div class="profile-email">
                        {{ $user->email }}
                    </div>

                    {{-- Name --}}
                    <div class="profile-info">
                        <div class="profile-label">
                            Name
                        </div>

                        <div class="profile-value">
                            {{ $user->name }}
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="profile-info">
                        <div class="profile-label">
                            Email Address
                        </div>

                        <div class="profile-value">
                            {{ $user->email }}
                        </div>
                    </div>

                    {{-- Role --}}
                    <div class="profile-info">
                        <div class="profile-label">
                            Account Role
                        </div>

                        <div class="profile-value">

                            @if($user->role == 'admin')
                                <span class="badge bg-danger px-3 py-2">
                                    Admin
                                </span>
                            @else
                                <span class="badge bg-success px-3 py-2">
                                    Customer
                                </span>
                            @endif

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection