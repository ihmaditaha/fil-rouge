@extends('layouts.app')

@section('content')
<div class="hero-section bg-primary text-white py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold mb-4">Welcome to WeRoom</h1>
                <p class="lead mb-4">
                    Find your perfect living space or the ideal roommates. 
                    Connect with landlords and tenants in your area.
                </p>
                <div>
                    @if(auth()->check())
                        <a href="{{ route('shop.search') }}" class="btn btn-light btn-lg me-2">Browse Listings</a>
                    @else
                        <a href="{{ route('register.create') }}" class="btn btn-light btn-lg me-2">Get Started</a>
                        <a href="{{ route('shop.search') }}" class="btn btn-outline-light btn-lg">Browse Listings</a>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x400?text=WeRoom" class="img-fluid rounded" alt="WeRoom illustration">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <div class="display-4 text-primary mb-3">🏠</div>
                    <h5 class="card-title">Find Properties</h5>
                    <p class="card-text">
                        Browse thousands of listings from landlords. 
                        Filter by location, price, and property type.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <div class="display-4 text-success mb-3">👥</div>
                    <h5 class="card-title">Meet Roommates</h5>
                    <p class="card-text">
                        Search for colocation opportunities and find 
                        compatible roommates in your preferred area.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <div class="display-4 text-info mb-3">💬</div>
                    <h5 class="card-title">Connect Directly</h5>
                    <p class="card-text">
                        Message landlords and tenants directly. 
                        No middleman, no hidden fees.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-light py-5 mb-5">
    <div class="container">
        <h2 class="text-center mb-4">How It Works</h2>
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="badge bg-primary text-white p-3" style="font-size: 1.5rem;">1</div>
                </div>
                <h5>Create Account</h5>
                <p class="text-muted">Sign up as a student or landlord</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="badge bg-primary text-white p-3" style="font-size: 1.5rem;">2</div>
                </div>
                <h5>Search or List</h5>
                <p class="text-muted">Post property or search for listings</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="badge bg-primary text-white p-3" style="font-size: 1.5rem;">3</div>
                </div>
                <h5>Connect</h5>
                <p class="text-muted">Message landlords or tenants</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="mb-3">
                    <div class="badge bg-primary text-white p-3" style="font-size: 1.5rem;">4</div>
                </div>
                <h5>Move In</h5>
                <p class="text-muted">Sign lease and start your new life</p>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <h2 class="text-center mb-4">Featured Listings</h2>
    <div class="row">
        @foreach(\App\Models\Announce::where('status', 'approved')->take(3)->get() as $announce)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    @if($announce->property && $announce->property->pictures->count())
                        <img src="{{ asset('storage/' . $announce->property->pictures->first()->path) }}" 
                             class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $announce->title }}">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-muted">No photo</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $announce->title }}</h5>
                        <p class="card-text text-muted">{{ $announce->location }}</p>
                        @if($announce->property)
                            <p class="card-text"><strong>{{ $announce->property->price }}€/month</strong></p>
                        @endif
                        <a href="{{ route('shop.show', $announce) }}" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('shop.search') }}" class="btn btn-primary btn-lg">View All Listings</a>
    </div>
</div>
@endsection
