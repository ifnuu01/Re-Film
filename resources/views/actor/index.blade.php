@extends('layouts.dashboard')

@section('halaman')
    Actor Page List
@endsection

@section('actor-active')
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
        @auth
            
        <a href="{{ route('actor.create') }}" class="btn btn-blue btn-sm mb-3">Add Actor</a>
        <table id="example" class="table table-stripped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Name Actor</th>
                    <th>Cast</th>
                    <th>Film</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($actors as $key => $actor)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->cast->name }}</td>
                    <td>{{ $actor->film->title }}</td>
                    <td>
                        <form action="{{ route('actor.destroy', $actor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <a href="{{ route('actor.edit', $actor->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure to delete this data?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Data is empty</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @endauth
        @guest
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @forelse ($actors as $actor)
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ $actor->name }}</h5>
                        <p class="card-text">Film: {{ $actor->film->title }}</p>
                        <p class="card-text">Cast: {{ $actor->cast->name }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">Data is empty</h5>
                    </div>
                </div>
            </div>
            @endforelse
        @endguest
    </div>
    @endsection