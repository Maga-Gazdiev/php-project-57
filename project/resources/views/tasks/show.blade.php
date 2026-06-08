@extends('layouts.an')

@section('content')
<main class='container py-4'>
    <table class="table caption-top">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h2 class="mb-4">Просмотр задачи: {{ $tasks->name }}</h2>
                <p><span class="fw-bold">Имя: </span>{{ $tasks->name }}</p>
                <p><span class="fw-bold">Статус: </span>{{ $tasks->status->name }}</p>
                <p><span class="fw-bold">Описание: </span>{{ $tasks->description }}</p>
            </div>
        </div>
    </table>
</main>
@endsection
