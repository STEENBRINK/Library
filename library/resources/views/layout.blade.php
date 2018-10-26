<html>
<head>
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
    <title>Library</title>
</head>
<body>
    @include('sections.nav')

    <div class="default">
        <section class="content">
            @yield('content')
        </section>
    </div>

    @include('sections.footer')
</body>
</html>