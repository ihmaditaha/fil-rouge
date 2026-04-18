<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>WeRoom</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}">🏠 WeRoom</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @if(auth()->check())
                            <!-- Authenticated User Navigation -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shop.search') }}">Browse</a>
                            </li>

                            @if(auth()->user()->isStudent())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('student.announces.index') }}">My Searches</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-success btn-sm ms-2" href="{{ route('student.announces.create') }}">+ New Search</a>
                                </li>
                            @elseif(auth()->user()->isLandlord())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('landlord.announces.index') }}">My Properties</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-success btn-sm ms-2" href="{{ route('landlord.announces.create') }}">+ New Property</a>
                                </li>
                            @elseif(auth()->user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.announces.pending') }}">Pending Review</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.announces.index') }}">All Announcements</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    👤 {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <!-- Guest Navigation -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.create') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary btn-sm ms-2" href="{{ route('register.create') }}">Sign Up</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @if(session('success'))
                <div class="container mt-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="container mt-4">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="bg-dark text-white text-center py-4 mt-5">
            <div class="container">
                <p>&copy; 2026 WeRoom. All rights reserved.</p>
                <small>
                    <a href="{{ route('home') }}" class="text-white-50">Home</a> |
                    <a href="{{ route('about') }}" class="text-white-50">About</a> |
                    <a href="{{ route('contact') }}" class="text-white-50">Contact</a>
                </small>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
