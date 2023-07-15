<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_title' => 'required|string|max:25',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
        ]);

        $project = new Project();
        $project->project_title = $request->project_title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->finish_date = $request->finish_date;
        $project->save();

        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'project_title' => 'required|string|max:25',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
        ]);

        $project = Project::findOrFail($id);
        $project->project_title = $request->project_title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->finish_date = $request->finish_date;
        $project->save();

        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(null, 204);
    }
}
