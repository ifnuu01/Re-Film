@extends('layouts.dashboard')
@section('halaman')
    Create Page Film
@endsection

@section('film-active')
    active rounded
@endsection

@section('content')
    <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-5">
                <label for="judul" class="form-label text-white">Film Title</label>
                <input type="text" class="form-control" id="judul" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="genre" class="form-label text-white">Genre Film</label>
                <select name="genre_id" id="genre" class="form-select">
                    <option value="">Pilih Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="tahun" class="form-label text-white">Release Year</label>
                <input type="number" class="form-control" id="tahun" name="release_year" value="{{ old('release_year') }}">
                @error('release_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="sinopsis" class="form-label text-white">Summary Film</label>
                <textarea name="summary" id="sinopsis" cols="30" rows="5" class="form-control">{{ old('summary') }}</textarea>
                @error('summary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="poster" class="form-label text-white">Poster Film</label>
                <input type="file" class="form-control" id="poster" name="poster" value="{{ old('poster') }}" accept="image/*">
                @error('poster')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('film.index') }}" class="btn btn-secondary btn-sm text-white">Back</a>
                <button type="submit" class="btn btn-blue btn-sm text-white">Add Film</button>
            </div>
        </div>
    </form>
@endsection