<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'all');

        $query = Task::latest();

        if ($filter === 'active') {
            $query->where('is_completed', false);
        } elseif ($filter === 'completed') {
            $query->where('is_completed', true);
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks', 'filter'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Task::create($validated);

        return redirect()
            ->route('tasks.index', ['filter' => $request->input('filter', 'all')])
            ->with('status', 'Task added!');
    }

    public function toggle(Request $request, Task $task)
    {
        $task->update([
            'is_completed' => ! $task->is_completed,
        ]);

        return redirect()
            ->route('tasks.index', ['filter' => $request->input('filter', 'all')])
            ->with('status', 'Task status updated!');
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index', ['filter' => $request->input('filter', 'all')])
            ->with('status', 'Task updated!');
    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index', ['filter' => $request->input('filter', 'all')])
            ->with('status', 'Task deleted!');
    }
}