@extends('layouts.dashboard')

@section('halaman')
    Edit Page Profile
@endsection

@section('profile-active')
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
        <div class="row">
            <div class="container-fluid rounded p-3">
                <form action="{{route('profile.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control text-secondary" id="name" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control text-secondary" id="email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $profile->age == 0 ? '' : $profile->age) }}">
                            @error('age')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio">{{ old('bio', $profile->bio) }}</textarea>
                            @error('bio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back</a>
                    <button type="submit" class="btn btn-warning btn-sm">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection