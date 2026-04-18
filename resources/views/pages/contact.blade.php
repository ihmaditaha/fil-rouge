@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Contact Us</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted mb-4">
                        Have a question or feedback? We'd love to hear from you. 
                        Fill out the form below and we'll get back to you shortly.
                    </p>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', auth()->user()?->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', auth()->user()?->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                   id="subject" name="subject" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="display-4 text-primary mb-2">📧</div>
                        <h5>Email</h5>
                        <p><a href="mailto:support@weroom.test">support@weroom.test</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center">
                        <div class="display-4 text-primary mb-2">📱</div>
                        <h5>Phone</h5>
                        <p>+33 1 23 45 67 89</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center">
                        <div class="display-4 text-primary mb-2">📍</div>
                        <h5>Address</h5>
                        <p>Paris, France</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
