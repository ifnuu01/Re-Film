@extends('layouts.dashboard')

@section('halaman')
    Edit Page Actor
@endsection

@section('actor-active')
    active rounded
@endsection

@section('content')
    <div class="container-fluid text-white">
        <div class="row">
            <div class="container-fluid rounded p-3">
                <form action="{{route('actor.update', $actor->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="name" class="form-label">Actor Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $actor->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cast_id" class="form-label">Cast</label>
                            <select class="form-select" id="cast_id" name="cast_id">
                                <option selected disabled>Select Cast</option>
                                @foreach ($casts as $cast)
                                    <option value="{{ $cast->id }}" {{ $actor->cast_id == $cast->id ? 'selected' : '' }}>{{ $cast->name }}</option>
                                @endforeach
                            </select>
                            @error('cast_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="film_id" class="form-label">Film</label>
                            <select class="form-select" id="film_id" name="film_id">
                                <option selected disabled>Select Film</option>
                                @foreach ($films as $film)
                                    <option value="{{ $film->id }}" {{ $actor->film_id == $film->id ? 'selected' : '' }}>{{ $film->title }}</option>
                                @endforeach
                            </select>
                            @error('film_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back</a>
                    <button type="submit" class="btn btn-warning btn-sm">Update Actor</button>
                </form>
            </div>
        </div>
    </div>
@endsection