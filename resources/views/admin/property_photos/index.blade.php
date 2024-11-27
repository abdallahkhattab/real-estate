@extends('admin.master')

@section('title', 'All Properties Photos | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">All Properties Photos</h1>
        <a href="{{ route('admin.property_photos.create') }}" class="btn btn-success px-5">Add New</a>
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
            <th>Property ID</th>
            <th>Property Type</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        @forelse ($photos as $photo)
            <tr class="text-center ">
                <td>{{ $photo->id }}</td>
                <td>{{ $photo->property->id }}</td>
                <td>{{ $photo->property->property_type }}</td>
                <td>
                    @if (!empty($photo->photo_path))
                        <img src="{{ asset($photo->photo_path) }}" alt="Property Photo" width="80" height="40">
                    @else
                        <span>Not Found Image</span>
                    @endif
                </td>
                <td>{{ $photo->description }}</td>

                <td>
                    <a href="{{ route('admin.property_photos.edit', $photo->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-{{ $photo->id }}" class="d-inline" action="{{ route('admin.property_photos.destroy', $photo->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="confirmDelete(event, 'delete-{{ $photo->id }}')" class="btn btn-sm btn-danger">
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

    {{ $photos->links() }}
@stop

@section('script')
    @include('admin.partial.sweataleart')
@stop
