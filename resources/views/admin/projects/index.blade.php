@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="container table table-hover mt-5">
            <thead>
                <th>#id</th>
                <th>Title</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="5">There aren't projects yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fa-solid fa-upload me-2"></i>Upload Project</a>
    </div>


@endsection