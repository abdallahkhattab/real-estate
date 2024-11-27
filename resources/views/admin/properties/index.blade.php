@extends('admin.master')

@section('title', 'All Properties | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">All Properties</h1>
        <a href="{{ route('admin.properties.create') }}" class="btn btn-success px-5">Add New</a>
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
            <th>Prperty Type</th>
            <th>ZIP Code</th>
            <th>Price</th>
            <th>Image</th>
            <th>City</th>
            <th>Listing Status</th>
            <th>Date Listed</th>
            <th>Actions</th>
        </tr>

        @forelse ($properties as $property)
            <tr class="text-center ">
                <td>{{ $property->id }}</td>
                <td>{{ $property->property_type }}</td>
                <td>{{ $property->zip_code }}</td>
                <td>{{ $property->price }}</td>
                <td>
                    @if (!empty($property->main_image))
                        <img src="{{ asset('uploads/' . $property->main_image) }}" alt="Property Image" width="80"
                            height="40">
                    @else
                        <span>Not Found Image</span>
                    @endif
                </td>
                <td>{{ $property->city }}</td>
                <td class="text-center">
                    @if ($property->listing_status == 'sold')
                        <span class="badge bg-danger text-white w-50 py-2">Sold</span>
                    @elseif ($property->listing_status == 'available')
                        <span class="badge bg-success text-white w-50 py-2">Available</span>
                    @elseif ($property->listing_status == 'pending')
                        <span class="badge bg-warning text-white w-50 py-2">Pending</span>
                    @endif
                </td>
                <td>{{ $property->date_listed }}</td>
                <td>
                    <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-{{ $property->id }}" class="d-inline" action="{{ route('admin.properties.destroy', $property->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="confirmDelete(event, 'delete-{{ $property->id }}')" class="btn btn-sm btn-danger">
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

    {{ $properties->links() }}
@stop

@section('script')
    @include('admin.partial.sweataleart')
@stop
