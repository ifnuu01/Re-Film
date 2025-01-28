@extends('layouts.dashboard')

@section('home-active')
    active rounded    
@endsection

@section('halaman')
    Page Welcome
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@guest
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <h2 class="text-white">Welcome to ReFilm!</h2>
        <p class="text-secondary">Discover, rate, and review your favorite movies. Sign up or log in to enjoy the full experience!</p>
        <a href="{{ route('register') }}" class="btn btn-orange me-2">Register</a>
        <a href="{{ route('login') }}" class="btn btn-orange">Log In</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <a href="{{route('guide')}}" class="btn btn-outline-info">View User Guide</a>
    </div>
</div>
@else
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <h2 class="text-white">Welcome Back, {{ Auth::user()->name }}!</h2>
        <p class="text-secondary">Ready to explore? Check out these features:</p>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-4 mb-3">
        <div class="card bg-dark text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-film fa-3x text-info mb-3"></i>
                <h5>Movie Database</h5>
                <p>Explore our extensive collection of movies.</p>
                <a href="{{ route('film.index') }}" class="btn btn-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-dark text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-star fa-3x text-warning mb-3"></i>
                <h5>Rate Movies</h5>
                <p>Rate movies and share your opinions with others.</p>
                <a href="{{ route('film.index') }}" class="btn btn-warning">Rate Now</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-dark text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-comments fa-3x text-success mb-3"></i>
                <h5>Review Movies</h5>
                <p>Write reviews and help others discover great movies.</p>
                <a href="{{ route('film.index') }}" class="btn btn-success">Write Review</a>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <a href="{{route('guide')}}" class="btn btn-outline-info">View User Guide</a>
    </div>
</div>
@endguest
@guest
<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <div class="d-flex align-items-center">
            <i class="fas fa-user-plus fa-2x me-3 text-primary"></i>
            <div>
                <h5 class="mb-1 text-white">Register Yourself</h5>
                <p class="mb-0 text-secondary">Create a new account to start using ReFilm.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="d-flex align-items-center">
            <i class="fas fa-sign-in-alt fa-2x me-3 text-danger"></i>
            <div>
                <h5 class="mb-1 text-white">Log In</h5>
                <p class="mb-0 text-secondary">Log in to your account if you already have one.</p>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
