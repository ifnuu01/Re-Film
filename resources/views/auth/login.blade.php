@extends('layouts.auth')
@section('title', )
    Login
@endsection

@section('card-title')
Login into your account
@endsection
@section('content')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label text-white">Email address</label>
        <input type="email" class="form-control login-input" name="email" id="email">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label text-white">Password</label>
        <input type="password" class="form-control login-input" name="password" id="password">
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn text-white login-button fw-bold w-100">Log in Now</button>
    
    <div class="divider">
        <span>Or</span>
    </div>
    
    <a href="{{route('register')}}" class="btn text-white register-button fw-bold w-100 re">Register</a>
</form>
@endsection
