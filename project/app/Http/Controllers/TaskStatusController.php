<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskStatus;

class TaskStatusController extends Controller
{
    public function index()
    {
        $taskStatuses = TaskStatus::paginate(20);
        return view('taskStatus.index', compact('taskStatuses'));
    }

    public function create()
    {
        $taskStatuses = new TaskStatus();
        return view('taskStatus.create', compact('taskStatuses'));
    }

    public function destroy(string $id)
    {
        $taskStatuses = TaskStatus::findOrFail($id);

        if ($taskStatuses->tasks->isNotEmpty()) {
            flash('Не удалось удалить статус')->error();
            return redirect()->route('task_statuses.index');
        } else {        
            $taskStatuses->delete();
            flash('Статус успешно удалён');
        }

        return redirect()->route('task_statuses.index');
    }
    public function show(string $id)
    {
        $this->destroy($id);
        return redirect()->route('task_statuses.index');
    }

    public function store(Request $request)
    {
        $taskStatuses = new TaskStatus();
        $taskStatuses->fill($request->all());
        $taskStatuses->save();

        return redirect()->route('task_statuses.index');
    }

    public function edit(string $id)
    {
        $statusId = TaskStatus::findOrFail($id);
        return view('taskStatus.edit', compact('statusId'));
    }

    public function update(Request $request, string $id)
    {
        $taskStatuses = TaskStatus::findOrFail($id);
        $taskStatuses->fill($request->all());
        $taskStatuses->save();

        return redirect()->route('task_statuses.index');
    }
}
