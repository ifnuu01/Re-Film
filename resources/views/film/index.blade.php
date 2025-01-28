@extends('layouts.dashboard')

@section('halaman')
    List Page Film
@endsection

@section('film-active')
    active rounded
@endsection

@push('styles-table')
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts-table')
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        // Filter items based on search input
        $('#search-box').on('input', function () {
            const searchTerm = $(this).val().toLowerCase();

            // Loop through each card and show/hide based on match
            $('.film-item').each(function () {
                const title = $(this).find('.movie-title').text().toLowerCase();
                $(this).toggle(title.includes(searchTerm));
            });
        });
    });
</script>
@endpush

@section('content')
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
@auth
<a href="{{ route('film.create') }}" class="btn btn-blue btn-sm mb-3">Add Film</a>
@endauth
<!-- Search Box -->
<div class="mb-3">
    <input type="text" id="search-box" class="form-control" placeholder="Search films..." />
</div>


<!-- Film Grid -->
<div id="film-container" class="row">
    @forelse ($films as $film)
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 mb-4 film-item">
            <div class="card border-0 bg-transparent">
                <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top rounded" alt="..." style="height: 250px; object-fit: cover;">
                <div class="card-body px-0">
                    <h5 class="movie-title text-white mb-0">{{ $film->title }}</h5>
                    <p class="movie-category mb-0 text-white">{{$film->genre->name}}</p>
                    <form action="{{ route('film.destroy', $film->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        @guest
                        <a href="{{route('film.show', $film->id)}}" class="btn btn-sm btn-blue text-white">Detail</a>
                        @else
                        <a href="{{route('film.show', $film->id)}}" class="btn btn-sm btn-blue text-white">Detail</a>
                        <a href="{{ route('film.edit', $film->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are u sure want to delete this film?')">Delete</button>
                        @endguest
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-danger">Data Film is empty</div>
        </div>
    @endforelse
</div>
@endsection
