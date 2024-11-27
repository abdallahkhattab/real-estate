<!-- resources/views/admin/properties_photos/edit.blade.php -->

@extends('admin.master')

@section('title', 'Edit Photo | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">Edit Photo</h1>
        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Back to All Photos</a>
    </div>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    @include('admin.partial.errors')
    <form action="{{ route('admin.property_photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="property_id" class="form-label">Select Property</label>
            <select name="property_id" id="property_id" class="form-control" required>
                <option value="" disabled>Select a Property</option>
                @foreach($properties as $property)
                    <option value="{{ $property->id }}" {{ $property->id == $photo->property_id ? 'selected' : '' }}>
                        {{ $property->property_type }} - {{ $property->address }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="photo_path" class="form-label">Upload New Photo (Optional)</label>
            <input type="file" name="photo_path" id="photo_path" class="form-control">
            @if ($photo->photo_path)
                <div class="mt-2">
                    <p>Current Photo:</p>
                    <img src="{{ asset($photo->photo_path) }}" alt="Current Photo" width="150" class="img-thumbnail">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Photo Description (Optional)</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $photo->description) }}</textarea>
        </div>

        <button class="btn btn-success px-5"> <i class="fas fa-check"></i> Update Photo</button>
    </form>
@endsection
