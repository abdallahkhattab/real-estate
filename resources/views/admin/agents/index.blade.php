@extends('admin.master')

@section('title', 'All Agents | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">All Agents</h1>
        <a href="{{ route('admin.agents.create') }}" class="btn btn-success px-5">Add New</a>
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
            <th>Image</th>
            <th>Actions</th>
        </tr>

        @forelse ($agents as $agent)
            <tr class="text-center ">
                <td>{{ $agent->id }}</td>
                <td>{{ $agent->name }}</td>
                <td>{{ $agent->job }}</td>
                <td>{{ Str::limit($agent->description, 50, '...') }}</td>
                <td>
                    @if (!empty($agent->image))
                    <img src="{{ asset($agent->image) }}" width="50" alt="Image" width="80" height="40">
                    @else
                        <span>Not Found Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.agents.edit', $agent->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-{{ $agent->id }}" class="d-inline" action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="confirmDelete(event, 'delete-{{ $agent->id }}')" class="btn btn-sm btn-danger">
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

    {{ $agents->links() }}
@stop

@section('script')
    @include('admin.partial.sweataleart')
@stop
