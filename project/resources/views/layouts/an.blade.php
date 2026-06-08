<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Менеджер задач</title>
</head>

<body>
    <header class="flex-shrink-0">
        <div class="container-lg">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                    <div class="navbar navbar-expand-md px-4">
                        <a class="navbar-brand flex items-center" href="{{ route('welcome') }}">
                            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Менеджер задач</span>
                        </a>
                        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                            <ul class="flex flex-col font-medium lg:flex-row lg:space-x-8 lg:mt-0 navbar-nav mr-auto">
                                <li class="nav-item active" style="width: 375px;">
                                    <a class="nav-link"></a>
                                </li>
                                <li class="nav-item active">
                                    <a href="{{route('tasks.index')}}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0 nav-link">
                                        Задачи </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="{{ route('task_statuses.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0 nav-link">
                                        Статусы </a>
                                </li>
                                <li class="nav-item active" style="width: 375px;">
                                    <a href="{{ route('labels.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0 nav-link">
                                        Метки </a>
                                </li>
                            </ul>
                        </div>
                        @guest()
                        <div class="flex items-center lg:order-2">
                            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded">
                                <button type="button" class="btn btn-primary">Вход</button>
                            </a>
                            <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded ml-2">
                                <button type="button" class="btn btn-primary">Регистрация</button>
                            </a>
                        </div>
                        @endguest
                        @auth()
                        <div class="flex items-center lg:order-2">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class='px-5'>
                            <a href="{{ route('logout') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button type="button" class="btn btn-primary"> Выход</button>
                            </a>
                            </div>
                        </div>
                        @endauth
                    </div>

                </nav>
            </div>

        </div>
    </header>
    @yield('content')
</body>
