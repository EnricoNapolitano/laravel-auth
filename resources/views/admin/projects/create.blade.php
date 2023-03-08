@extends('layouts.app')
@section('content')
<main class="container mt-5">
    <form action="{{ route('admin.projects.store') }}" method="POST" novalidate>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control" id="title" placeholder="Write a title for your project" name="title" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Project Image Url</label>
            <input type="url" class="form-control" id="image" placeholder="Insert url image..." name="image" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Project Content</label>
            <textarea class="form-control" id="content" rows="3" name="content" placeholder="Describe your project..."  required></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-upload me-2"></i>Upload</button>
    </form>
</main>
@endsection