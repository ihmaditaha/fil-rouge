@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-5">
        <div class="col-md-12">
            <h1>Welcome, {{ auth()->user()->name }}! 👋</h1>
            <p class="text-muted">Role: <strong>{{ ucfirst(auth()->user()->role->title) }}</strong></p>
        </div>
    </div>

    <div class="row">
        @if(auth()->user()->isLandlord())
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🏠 Create Property Listing</h5>
                        <p class="card-text">Post your apartment or room for rent to find tenants.</p>
                        <a href="{{ route('landlord.announces.create') }}" class="btn btn-primary">Create Listing</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">📋 My Properties</h5>
                        <p class="card-text">Manage and monitor all your active property listings.</p>
                        <a href="{{ route('landlord.announces.index') }}" class="btn btn-primary">View Listings</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🔍 Browse Housing</h5>
                        <p class="card-text">Explore what other landlords are offering.</p>
                        <a href="{{ route('shop.search') }}" class="btn btn-outline-primary">Browse</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">👤 My Profile</h5>
                        <p class="card-text">Update your profile and account information.</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        @endif

        @if(auth()->user()->isStudent())
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🔍 Browse Properties</h5>
                        <p class="card-text">Search and filter available properties and rooms.</p>
                        <a href="{{ route('shop.search') }}" class="btn btn-primary">Search Properties</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">👥 My Roommate Searches</h5>
                        <p class="card-text">Create or manage your colocation searches.</p>
                        <a href="{{ route('student.announces.index') }}" class="btn btn-primary">My Searches</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">➕ New Roommate Search</h5>
                        <p class="card-text">Post a new roommate search to find compatible roommates.</p>
                        <a href="{{ route('student.announces.create') }}" class="btn btn-success">Create Search</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">👤 My Profile</h5>
                        <p class="card-text">Update your preferences and profile information.</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        @endif

        @if(auth()->user()->isAdmin())
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-warning">
                    <div class="card-body">
                        <h5 class="card-title">⏳ Pending Review</h5>
                        <p class="card-text">Announcements awaiting your approval or rejection.</p>
                        <a href="{{ route('admin.announces.pending') }}" class="btn btn-warning">Review Pending</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">📊 All Announcements</h5>
                        <p class="card-text">View and filter all announcements on the platform.</p>
                        <a href="{{ route('admin.announces.index') }}" class="btn btn-primary">Manage Listings</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">👤 My Profile</h5>
                        <p class="card-text">Update your administrator account information.</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🏠 Browse Public</h5>
                        <p class="card-text">View the platform as a regular user would see it.</p>
                        <a href="{{ route('shop.search') }}" class="btn btn-outline-primary">Browse</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
