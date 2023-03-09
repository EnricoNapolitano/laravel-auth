<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'ASC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:projects|min:5|max:50',
            'content' => 'required|string',
            'image' => 'nullable|url',
        ], [
            'title.required' => 'Title is required',
            'title.unique' => 'This title has alreay been taken',
            'title.min' => 'Title has has to be minimun 5 letters',
            'title.max' => 'Title has has to be maximum 50 letters',
            'content.required' => 'Content can\'t be empty',
            'image.url' => 'Image needs a valid url',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        
        $project = new Project();
        $project->fill($data)->save();

        return to_route('admin.projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required','string',Rule::unique('projects')->ignore($project->id),'min:5','max:50'],
            'content' => 'required|string',
            'image' => 'nullable|url',
        ], [
            'title.required' => 'Title is required',
            'title.unique' => 'This title has alreay been taken',
            'title.min' => 'Title has has to be minimun 5 letters',
            'title.max' => 'Title has has to be maximum 50 letters',
            'content.required' => 'Content can\' t be empty',
            'image.url0' => 'Image needs a valid url',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        
        $project->fill($data)->save();

        return to_route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index');
    }
}
