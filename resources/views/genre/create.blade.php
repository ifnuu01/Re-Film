@extends('layouts.dashboard')
@section('halaman')
    Add Page Genre
@endsection

@section('genre-active')
    active rounded
@endsection

@section('content')
    <form action="{{ route('genre.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label text-white">Nama Genre</label>
            <input type="text" class="form-control w-50" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{ route('genre.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        <button type="submit" class="btn btn-blue btn-sm">Tambah Genre</button>
    </form>
@endsection