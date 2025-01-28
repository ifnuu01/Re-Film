@extends('layouts.dashboard')

@section('halaman')
    Detail Film {{ $film->title }}
@endsection

@section('film-active')
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
        <div class="col-12 col-lg-8 mb-3">
            <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" class="img-fluid mb-3 rounded" style="height: 400px; width:100%; object-fit: cover;">
            <div class="container-fluid rounded p-3" style="background-color: #161a20;">
                <form action="{{route('review.store')}}" method="POST">
                    @csrf
                    <!-- Rating Section -->
                    <div class="rating-stars mb-4">
                        <p class="mb-2">Rate</p>
                        <div class="">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" class="btn-check" name="point" id="point{{ $i }}" value="{{ $i }}">
                                <label class="btn btn-outline-info" for="point{{ $i }}">
                                    <i class="fas fa-star text-warning"></i> {{ $i }}
                                </label>
                            @endfor
                            @error('point')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- hidden --}}

                    <input type="hidden" name="film_id" value="{{ $film->id }}" hidden>

                    <!-- Comment Section -->
                    <div class="comment-section">   
                        <textarea class="form-control comment-box mb-3" rows="4" name="content" placeholder="Your Comment..."></textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-info w-100 text-white" type="submit">Send</button>
                    </div>
                </form>
            </div>
        @foreach ($film->reviews->sortByDesc('created_at') as $review)
            <div class="container-fluid rounded p-3 mt-3" style="background-color: #161a20;">
            <div class="d-flex justify-content-between">
                <div>
                <h5 class="text-white">{{ $review->user->name }}</h5>
                <p class="text-secondary">{{ $review->created_at->format('d M Y') }}</p>
                </div>
                <div class="rating-stars">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $review->point)
                    <i class="fas fa-star text-warning"></i>
                    @else
                    <i class="far fa-star text-warning"></i>
                    @endif
                @endfor
                </div>
            </div>
            <p class="text-white">{{ $review->content }}</p>
            </div>
        @endforeach
        </div>
        <div class="col-12 col-lg-4">
            <div class="card border-0 p-0" style="background-color: #161a20; height: fit-content;">
                <div class="card-body text-white mb-0">
                    <h3 class="card-title">{{ $film->title }}</h3>
                    <p class="card-text mx-0 my-0">Genre: {{ $film->genre->name }}</p>
                    <p class="card-text mx-0 my-0 mb-2">Release Year: {{ $film->release_year }}</p>
                    <form action="{{ route('film.destroy', $film->id) }}" method="POST" class="d-flex flex-column flex-lg-row w-100 mb-2">
                    @csrf
                    @method('DELETE')
                        @guest
                        <a href="{{ route('film.index') }}" class="btn btn-secondary btn-sm flex-grow-1 me-2 mb-2 mb-lg-0">Back</a>
                        @else    
                        <a href="{{ route('film.index') }}" class="btn btn-secondary btn-sm flex-grow-1 me-2 mb-2 mb-lg-0">Back</a>
                        <a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning btn-sm flex-grow-1 me-2 mb-2 mb-lg-0">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm flex-grow-1">Delete</button>
                        @endguest
                    </form>
                    <p class="card-text">Summary: {{ $film->summary }}</p>
                </div>
            </div>
            <div class="card border-0 p-0 mt-3" style="background-color: #161a20; height: fit-content;">
                <div class="card-body text-white">
                    <h5 class="card-title">List Actor</h5>
                    <ul class="list-group">
                        @forelse ($film->actors as $actor)
                            <li class="list-group-item"><i class="bi bi-person"></i> {{ $actor->name }}</li>
                        @empty
                            <li class="list-group-item text-warning">No Actor</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
