<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
    <main class="grid-container">
        @section('sidebar')
            <aside class="sidebar">
        <div class="container">
        <ul class="link-list">
            <li class="link-list__item"><a href="#">1</a></li>
            <li class="link-list__item"><a href="#">2</a></li>
            <li class="link-list__item"><a href="#">3</a></li>
            <li class="link-list__item"><a  href="#">4</a></li>
            <li class="link-list__item"><a href="#">5</a></li>
        </ul>

        </div>
      </aside>
        @show
        <div class="content">
            @yield('content')
        </div>
    </main>
    {{-- <div class="container-main">

    @yield('content')

    </div> --}}
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>

</body>
</html>
