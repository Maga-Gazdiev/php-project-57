@extends('layouts.an')

@section('content')
<main class="container by-4">
    <form method="POST" action="{{ route('tasks.store') }}" accept-charset="UTF-8" class="w-50">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Имя</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        @if ($errors->any())
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @endif

        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" cols="50" rows="10" id="description"></textarea>
        </div>
        @if ($errors->any())
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @endif

        <div class="form-group mb-3">
            <label for="status_id">Статус</label>
            <select class="form-control" id="status_id" name="status_id">
                <option selected="selected" value="">----------</option>
                @foreach ($status as $statuses)
                <option value="{{ $statuses->id }}">{{ $statuses->name }}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->any())
        @error('status_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @endif

        <div class="form-group mb-3">
            <label for="assigned_to_id">Исполнитель</label>
            <select class="form-control" id="assigned_to_id" name="assigned_to_id">
                <option selected="selected" value="">----------</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="labels">Метки</label>
            <select class="form-control" multiple="" name="labels[]">
                <option selected="selected" value="">----------</option>
                @foreach ($labels as $label)
                <option value="{{ $label->id }}">{{ $label->name }}</option>
                @endforeach
        </div>

        <input class="btn btn-primary mt-3" type="submit" value="Создать">
    </form>
</main>
@endsection