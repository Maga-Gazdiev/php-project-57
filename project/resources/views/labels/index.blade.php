@extends('layouts.an')

@section('content')


<main class="container-lg px-5">
@include('flash::message')
<div class="mb-5"></div>
    <h1 class="mb-3">Метки</h1>
    @auth
    <a href="{{ route('labels.create') }}" class="btn btn-primary">Создать метку</a>
    @endauth

    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>Дата создания</th>
                @auth
                <th>Действия</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($labels as $label)
            <tr>
                <td>{{ $label->id }}</td>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                @auth
                <td>
                    <a href="{{ route('labels.destroy', $label->id) }}" class="text-danger btn btn-sm fs-6">Удалить</a>
                    <a href="{{ route('labels.edit', $label->id) }}" class="text-primary btn btn-sm fs-6">Изменить</a>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>

</main>
@endsection