@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">About WeRoom</h1>

            <div class="mb-5">
                <h3>Our Mission</h3>
                <p>
                    WeRoom is dedicated to making the housing search process easier and more transparent. 
                    We connect students and young professionals with landlords and property owners in a 
                    simple, secure, and direct way.
                </p>
            </div>

            <div class="mb-5">
                <h3>Who We Are</h3>
                <p>
                    Founded in 2024, WeRoom started as a solution to the challenges faced by students 
                    searching for accommodation. We understand that finding the right place to live is 
                    more than just a transaction—it's about finding a community that fits your lifestyle.
                </p>
            </div>

            <div class="mb-5">
                <h3>What We Offer</h3>
                <ul>
                    <li><strong>Transparent Listings:</strong> All listings are moderated and verified</li>
                    <li><strong>Direct Communication:</strong> Message landlords and tenants directly</li>
                    <li><strong>Flexible Search:</strong> Filter by location, price, amenities, and more</li>
                    <li><strong>Safe & Secure:</strong> Your personal information is protected</li>
                    <li><strong>Colocation Matching:</strong> Find compatible roommates for shared living</li>
                </ul>
            </div>

            <div class="mb-5">
                <h3>Why Choose WeRoom?</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h5>For Students</h5>
                        <p>
                            Easy access to student-friendly housing options. 
                            Find roommates with similar preferences and budgets.
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5>For Landlords</h5>
                        <p>
                            Reach qualified tenants directly. 
                            Manage your listings and communicate with potential renters.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <h3>Our Values</h3>
                <ul>
                    <li><strong>Transparency:</strong> Honest listings and clear communication</li>
                    <li><strong>Inclusivity:</strong> Welcoming to all backgrounds and communities</li>
                    <li><strong>Security:</strong> Protecting user data and transactions</li>
                    <li><strong>Community:</strong> Building connections between people</li>
                </ul>
            </div>

            <div class="card bg-light mb-5">
                <div class="card-body text-center">
                    <h5>Have questions?</h5>
                    <p class="mb-0">
                        <a href="{{ route('contact') }}">Contact us</a> for more information about WeRoom.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
