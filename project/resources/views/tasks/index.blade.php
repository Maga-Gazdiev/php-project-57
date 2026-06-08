@extends('layouts.an')

@section('content')


<div class='container-lg px-5'>
  @include('flash::message')
  <div class="mb-5"></div>
  <h1 class="mb-4">Задачи</h1>
  <div class="d-flex">
    <div>
      <form method="GET" action="{{ route('tasks.index') }}" accept-charset="UTF-8">
        <div class="g-3 d-flex justify-content-between">
          <div class="col-3 px-1">
            <select class="form-select" name="filter[status_id]">
              <option value="">Статус</option>
              @foreach ($taskStatuses as $taskStatus)
              <option value="{{ $taskStatus->id }}">{{ $taskStatus->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-7 px-1">
            <select class="form-select" name="filter[created_by_id]">
              <option selected="selected" value="">Автор</option>
              @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-7 px-1">
            <select class="form-select" name="filter[assigned_to_id]">
              <option selected="selected" value="">Исполнитель</option>
              @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-2 px-1">
            <input class="btn btn-outline-primary me-2" type="submit" value="Применить">
          </div>

        </div>
      </form>
    </div>
    @auth
    <div class="ms-auto">
      <a href="{{ route('tasks.create') }}" class="btn btn-primary ml-auto">
        Создать задачу </a>
    </div>
    @endauth
  </div>
  <table class="table mt-2">
    <thead>
      <tr>
        <th>id</th>
        <th>Статус</th>
        <th>Имя</th>
        <th>Автор</th>
        <th>Исполнитель</th>
        <th>Дата создания</th>
        @auth
        <th>@lang('Действия')</th>
        @endauth
      </tr>
    </thead>

    <tbody>

      @foreach ($tasks as $task)
      <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->status->name }}</td>
        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->name }}</a></td>
        <td>{{ $task->author->name }}</td>
        <td>{{ $task->assigned_to_id ? $users->find($task->assigned_to_id)->name : 'Исполнитель не определен' }}
        </td>
        <td>{{ $task->created_at->format('d.m.Y') }}</td>
        @auth
        <td>
          <a class="text-decoration-none" href="{{ route('tasks.edit', $task->id) }}">Изменить </a>
          @can('destroy', $task)
          <a class="text-danger btn btn-sm fs-6" href="{{ route('tasks.destroy', $task->id) }}" >Удалить</a>
          @endcan
        </td>
        @endauth
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
