<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_title' => 'required|string|max:25',
            'description' => 'required|string',
            'id_state' => 'required|integer',
            'id_project' => 'required|integer',
        ]);

        $task = new Task();
        $task->task_title = $request->task_title;
        $task->description = $request->description;
        $task->id_state = $request->id_state;
        $task->id_project = $request->id_project;
        $task->save();

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task_title' => 'required|string|max:25',
            'description' => 'required|string',
            'id_state' => 'required|integer',
            'id_project' => 'required|integer',
        ]);

        $task = Task::findOrFail($id);
        $task->task_title = $request->task_title;
        $task->description = $request->description;
        $task->id_state = $request->id_state;
        $task->id_project = $request->id_project;
        $task->save();

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}
