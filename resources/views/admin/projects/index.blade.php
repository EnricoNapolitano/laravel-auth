@extends('layouts.app')
@section('content')

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
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="5">There aren't projects yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

@endsection