<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lottery</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('javascript-head')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="margin-bottom: 10px;">
            <a class="navbar-brand" href="\">Lottery（仮）</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <form action="/serch" method="POST"  class="form-inline my-2 my-lg-0">
                            @csrf
                            <input　name="serchword" class="form-control mr-sm-2" type="text" placeholder="大会を探す">
                            <input class="btn btn-outline-success my-2 my-sm-0" type="submit"></input>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0 active">
                    @if (Auth::check())
                    <li class="nav-item">
                        <a name="" id="" class="btn btn-primary md" href="/create" role="button">大会を主催する</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">アカウントメニュー</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="/my">マイページ</a>
                            <a class="dropdown-item" href="/logout">ログアウト</a>
                            <a class="dropdown-item" href="#">退会</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">ログイン <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/register">新規登録 <span class="sr-only">(current)</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
