<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">

  @yield('css')
  @livewireStyles
</head>

<body>
  <header class="header">
    <div class="header__inner">
        <p class="header__logo">FashionablyLate</p>
    </div>
    <div class="header-actions">
            @if (Auth::check())
                <!-- ログアウトボタン -->
                <form action="/logout" method="post">
                @csrf
                <button class="header-logout__button">logout</button>
                </form>
            @else
                <!-- ログインボタンと登録ボタンの切り替え -->
                @if (request()->routeIs('register'))
                    <a class="header-action__button" href="/login">login</a>
                @elseif (request()->routeIs('login'))
                    <a class="header-action__button" href="/register">register</a>
                @endif
            @endif
    </div>
  </header>

  <main>
    @yield('content')
  </main>
  @livewireScripts
</body>

</html>