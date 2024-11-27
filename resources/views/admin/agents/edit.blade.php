@extends('admin.master')

@section('title', 'Edit Agent | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">Edit Agent</h1>
        <a href="{{ route('admin.agents.index') }}" class="btn btn-success px-5">All Agents</a>
    </div>
    @include('admin.partial.errors')
    <form action="{{ route('admin.agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Agent Name" class="form-control"
                value="{{ $agent->name }}">
        </div>

        <div class="mb-3">
            <label for="job">Job</label>
            <input type="text" name="job" placeholder="Enter Job" class="form-control" value="{{ $agent->job }}">
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Agent Description</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ $agent->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image">Agent Image</label>
            <input type="file" name="image" class="form-control">
            @if ($agent->image)
                <div class="mt-2">
                    <p>Current Photo:</p>
                    <img src="{{ asset($agent->image) }}" alt="Current Photo" width="150" class="img-thumbnail">
                </div>
            @endif
        </div>

        <button class="btn btn-success px-5"> <i class="fas fa-check"></i> Update Agent</button>
    </form>
@stop
