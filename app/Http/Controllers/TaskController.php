<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = new Task;
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->user_id = auth()->user()->id;
        $task->save();

        return response()->json($task);
    }

    public function update(Request $request)
    {
    }
    public function destroy(Request $request)
    {
    }
}
