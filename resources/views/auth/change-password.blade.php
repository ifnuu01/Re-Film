@extends('layouts.dashboard')

@section('halaman')
    Page Settings
@endsection

@section('settings-active')
    active rounded
@endsection

@section('content')
    <div class="container-fluid text-white">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h3>Change Password</h3>
        <div class="row">
            <div class="container-fluid rounded p-3">
                <form action="{{route('settings')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="new_confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password">
                            @error('new_confirm_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm text-white">Back</a>
                    <button type="submit" class="btn btn-warning btn-sm text-white">Change Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection