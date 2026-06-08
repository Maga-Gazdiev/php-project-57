<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use App\Models\User;
use App\Models\Task;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $taskStatuses = TaskStatus::all();

        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id'),
            ])->get();
        return view('tasks.index', compact('tasks', 'taskStatuses', 'users'));
    }

    public function create()
    {
        $status = TaskStatus::all();
        $users = User::all();
        $labels = Label::all();

        return view('tasks.create', compact('users', 'status', 'labels'));
    }

    public function store(Request $request)
    {
        $users = Auth::user();
        $tasks = new Task();
        $tasks->fill($request->all());
        $tasks->created_by_id = $users->id;
        $tasks->save();

        return redirect()->route('tasks.index');
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        if (isset($task->assigned_to_id)) {
            $user = User::findOrFail($task->assigned_to_id);
        } else {
            $user = 'не указан';
        }

        $statuses = TaskStatus::all();
        $users = User::all();
        $labels = Label::all();
        return view('tasks.edit', compact('task', 'user', 'statuses', 'users', 'labels'));
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->fill($request->all());
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function new(string $id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.show', compact('tasks'));
    }

    public function show(string $id)
    {
        $this->destroy($id);
        return redirect()->route('tasks.index');
    }
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        flash('Задача успешно удалена')->success();
        return redirect()->route('tasks.index');
    }
}

