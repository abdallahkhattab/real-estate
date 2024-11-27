@extends('admin.master')

@section('title', 'All Reviews | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">All Reviews</h1>
        <a href="{{ route('admin.reviews.create') }}" class="btn btn-success px-5">Add New</a>
    </div>

    @if (session('msg'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <tr class="bg-dark text-white text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Job</th>
            <th>Description</th>
            <th>Stars</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        @forelse ($reviews as $review)
            <tr class="text-center ">
                <td>{{ $review->id }}</td>
                <td>{{ $review->name }}</td>
                <td>{{ $review->job }}</td>
                <td>{{ Str::limit($review->description, 50, '...') }}</td>
                <td>{{ $review->stars }}</td>
                <td>
                    @if (!empty($review->image))
                    <img src="{{ asset($review->image) }}" width="50" alt="Image" width="80" height="40">
                    @else
                        <span>Not Found Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-form-{{ $review->id }}" class="d-inline" action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="confirmDelete(event, 'delete-form-{{ $review->id }}')" class="btn btn-sm btn-danger">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Not Data Found</td>
            </tr>
        @endforelse
    </table>

    {{ $reviews->links() }}
@stop

@section('script')
    @include('admin.partial.sweataleart')
@stop
