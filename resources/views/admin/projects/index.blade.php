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
                <td></td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="5">There aren't projects yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

@endsection