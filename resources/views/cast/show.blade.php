@extends('layouts.dashboard')

@section('halaman')
    Detail Cast {{ $cast->name }}
@endsection

@section('cast-active')
    active rounded
@endsection

@section('content')
<div class="container-fluid text-white">
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-12 col-lg-12">
            <div class="container-fluid rounded p-3" style="background-color: #161a20;">
                <h3 class="text-white mb-0">{{ $cast->name }}</h3>
                <p class="text-white mb-0">Age: {{ $cast->age}}</p>
                <p class="text-secondary">{{ $cast->created_at->format('d M Y') }}</p>
                <p class="text-white">{{ $cast->bio }}</p>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            @guest
            <a href="{{ route('cast.index') }}" class="btn btn-secondary w-50 mt-3 flex-grow-1 me-2">Back</a>    
            @endguest
            <form action="{{route('cast.destroy', $cast->id)}}" class="d-flex w-100 mb-2 " method="POST">
                @csrf
                @method('DELETE')
                @auth
                <a href="{{ route('cast.index') }}" class="btn btn-secondary w-100 mt-3 flex-grow-1 me-2">Back</a>
                <a href="{{ route('cast.edit', $cast->id) }}" class="btn btn-warning w-100 mt-3 flex-grow-1 me-2">Edit</a>
                <button type="submit" class="btn btn-danger w-100 mt-3 flex-grow-1 me-2" onclick="return confirm('Are you sure?')">Delete</button>
                @endauth
            </form>
        </div>
@endsection