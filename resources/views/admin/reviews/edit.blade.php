@extends('admin.master')

@section('title', 'Edit Review | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">Edit Review</h1>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-success px-5">All Reviews</a>
    </div>
    @include('admin.partial.errors')
    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Reviewer Name" class="form-control"
                value="{{ $review->name }}">
        </div>

        <div class="mb-3">
            <label for="job">Job</label>
            <input type="text" name="job" placeholder="Enter Job" class="form-control" value="{{ $review->job }}">
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Review Description</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ $review->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="stars">Stars</label>
            <input type="number" name="stars" placeholder="Enter Stars" class="form-control" min="1"
                max="5" value="{{ $review->stars }}">
        </div>

        <div class="mb-3">
            <label for="image">Reviewer Images</label>
            <input type="file" name="image" class="form-control">
            @if ($review->image)
                <div class="mt-2">
                    <p>Current Photo:</p>
                    <img src="{{ asset($review->image) }}" alt="Current Photo" width="150" class="img-thumbnail">
                </div>
            @endif
        </div>

        <button class="btn btn-success px-5"> <i class="fas fa-check"></i> Update Review</button>
    </form>
@stop
