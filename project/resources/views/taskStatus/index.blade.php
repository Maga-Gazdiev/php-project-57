@extends('layouts.an')

@section('content')

<div class="container-lg px-5">
  @include('flash::message')
  <div class="mb-5"></div>
  <h1 class="mb-3">Статусы</h1>
  @auth
  <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">Создать статуc</a>
  @endauth

  <table class="table mt-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Дата создания</th>
        @auth
        <th>Действия</th>
        @endauth
      </tr>
    </thead>
    <tbody>
      @foreach ($taskStatuses as $taskStatus)
      <tr>
        <td>{{ $taskStatus->id }}</td>
        <td>{{ $taskStatus->name }}</td>
        <td>{{ $taskStatus->created_at->format('d.m.Y') }}</td>
        @auth
        <td>
          <a href="{{ route('task_statuses.destroy', $taskStatus->id) }}" class="text-danger btn btn-sm fs-6">Удалить</a>
          <a href="{{ route('task_statuses.edit', $taskStatus->id) }}" class="text-primary btn btn-sm fs-6">Изменить</a>
        </td>
        @endauth
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
