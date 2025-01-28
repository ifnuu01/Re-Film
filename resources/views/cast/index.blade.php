@extends('layouts.dashboard')

@section('halaman')
    List Page Cast
@endsection

@section('cast-active')
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
  $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
    $('#example').DataTable({
      paging: true, // Enable pagination
      searching: true, // Enable search box
      info: true, // Show info about the table
      ordering: true, // Enable column sorting
      lengthMenu: [10, 25, 50, 100], // Entries per page options
    });
  });
</script>
@endpush

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
        @auth
        <a href="{{ route('cast.create') }}" class="btn btn-blue btn-sm mb-3">Add Cast</a>
        <table id="example" class="table table-stripped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Name Cast</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($casts as $key => $cast)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $cast->name }}</td>
                    <td>
                        <form action="{{ route('cast.destroy', $cast->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('cast.show', $cast->id) }}" class="btn btn-blue btn-sm">Detail</a>
                            <a href="{{ route('cast.edit', $cast->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                            <button class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @endauth
        @guest
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @forelse ($casts as $cast)
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cast->name }}</h5>
                        <p class="card-text">{{ Str::limit($cast->bio, 20) }}</p>
                        <a href="{{ route('cast.show', $cast->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="w-100">
                <div class="alert alert-danger">Data Cast is empty</div>
            </div>
            @endforelse
        </div>
        @endguest
    </div>
    @endsection
    