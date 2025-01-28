@extends('layouts.dashboard')

@section('halaman')
    Add Page Cast
@endsection

@section('cast-active')
    active rounded
@endsection


@section('content')
    <div class="container-fluid text-white">
        <div class="row">
            <div class="container-fluid rounded p-3">
                <form action="{{route('cast.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
                            @error('age')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3">{{ old('bio') }}</textarea>
                        @error('bio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{ route('cast.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    <button type="submit" class="btn btn-blue btn-sm">Add Cast</button>
                </form>
            </div>
        </div>
    </div>
@endsection