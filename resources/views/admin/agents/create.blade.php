@extends('admin.master')

@section('title','Add New Agents | ' . env('APP_NAME'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-4 text-gray-800">Add New Agent</h1>
        <a href="{{ route('admin.agents.index') }}" class="btn btn-success px-5">All Agents</a>
    </div>

    @include('admin.partial.errors')

    <form action="{{ route('admin.agents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

         <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Agent Name" class="form-control" value="{{ old('name') }}">
         </div>

         <div class="mb-3">
            <label for="job">Job</label>
            <input type="text" name="job" placeholder="Enter Job" class="form-control" value="{{ old('job') }}">
         </div>

         <div class="mb-3">
            <label for="description" class="form-label">Agent Description</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
        </div>

         <div class="mb-3">
            <label for="image">Agent Image</label>
            <input type="file" name="image" class="form-control">
         </div>


         <button class="btn btn-success px-5"> <i class="fas fa-check"></i> Add Agent</button>
    </form>
@stop
