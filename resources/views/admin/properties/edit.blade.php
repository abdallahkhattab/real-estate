@extends('admin.master')

@section('title', 'Edit Properties | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">Edit Properties</h1>
        <a href="{{ route('admin.properties.index') }}" class="btn btn-success px-5">All properties</a>
    </div>
    @include('admin.partial.errors')
    <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name">Property Type</label>
            <input type="text" name="property_type" placeholder="Enter Property Type" class="form-control"
                value="{{ $property->property_type }}">
        </div>

        <div class="mb-3">
            <label for="price">Address</label>
            <input type="text" name="address" placeholder="Enter address" class="form-control"
                value="{{ $property->address }}">
        </div>

        <div class="mb-3">
            <label for="city">City</label>
            <input type="text" name="city" placeholder="Enter City" class="form-control"
                value="{{ $property->city }}">
        </div>

        <div class="mb-3">
            <label for="state">State</label>
            <input type="text" name="state" placeholder="Enter State" class="form-control"
                value="{{ $property->state }}">
        </div>

        <div class="mb-3">
            <label for="zip_code">ZIP Code</label>
            <input type="text" name="zip_code" placeholder="Enter ZIP Code" class="form-control"
                value="{{ $property->zip_code }}">
        </div>

        <div class="mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" placeholder="Enter Price" class="form-control"
                value="{{ $property->price }}">
        </div>

        <div class="mb-3">
            <label for="main_image">Property Images</label>
            <input type="file" name="main_image" class="form-control">
            <div class="mt-2">
                <p>Current Photo:</p>
                <img width="150" class="img-thumbnail" src="{{ asset('uploads/' . $property->main_image) }}"
                    alt="Current Image">

            </div>
        </div>

        <div class="mb-3">
            <label for="bed_rooms">BedRooms</label>
            <input type="number" name="bed_rooms" placeholder="Enter Number of BedRooms" class="form-control"
                value="{{ $property->bed_rooms }}">
        </div>

        <div class="mb-3">
            <label for="bath_rooms">Bathrooms</label>
            <input type="number" name="bath_rooms" placeholder="Enter Number of Bathrooms" class="form-control"
                value="{{ $property->bath_rooms }}">
        </div>

        <div class="mb-3">
            <label for="square_footage">Square Footage</label>
            <input type="number" name="square_footage" placeholder="Enter Square Footage" class="form-control"
                value="{{ $property->square_footage }}">
        </div>

        <div class="mb-3">
            <label for="year_built">Year Built</label>
            <input type="number" name="year_built" placeholder="Enter Year Built" class="form-control"
                value="{{ $property->year_built }}">
        </div>

        <div class="mb-3">
            <label for="listing_status">Listing Status</label>
            <select name="listing_status" class="form-control">
                <option value="available"
                    {{ (old('listing_status') ?? $property->listing_status) == 'available' ? 'selected' : '' }}>Available
                </option>
                <option value="sold"
                    {{ (old('listing_status') ?? $property->listing_status) == 'sold' ? 'selected' : '' }}>Sold</option>
                <option value="pending"
                    {{ (old('listing_status') ?? $property->listing_status) == 'pending' ? 'selected' : '' }}>Pending
                </option>
            </select>
        </div>


        <div class="mb-3">
            <label for="date_listed">Date Listed</label>
            <input type="date" name="date_listed" class="form-control" value="{{ $property->date_listed }}">
        </div>




        <button class="btn btn-success px-5"> <i class="fas fa-check"></i> Add Property</button>
    </form>
@stop
