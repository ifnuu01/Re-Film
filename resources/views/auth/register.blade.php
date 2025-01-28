@extends('layouts.auth')
@section('title', )
    Register
@endsection

@section('card-title')
Create Your Account
@endsection
@section('content')
<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label text-white">Name</label>
        <input type="text" class="form-control login-input" name="name" id="name">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
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
    
    <button type="submit" class="btn text-white login-button fw-bold w-100">Create Account</button>
    
    <div class="divider">
        <span>Or</span>
    </div>
    
    <a href="{{route('login')}}" class="btn text-white register-button fw-bold w-100 re">Login</a>
</form>
@endsection
