@extends('layouts.an')

@section('content')
    <main class="container py-4">
        <h1 class="mb-5">Создать метку</h1>
        <form method="POST" action="{{ route('labels.store') }}" accept-charset="UTF-8" class="w-50">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input class="form-control" name="name" type="text" id="name">
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" cols="50" rows="10" id="description"></textarea>
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="Создать">
        </form>
    </main>
@endsection