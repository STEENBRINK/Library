<html>
<head>
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
    <title>Library</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('sections.nav')
    @if($flash = session('message'))
        <div class="alert" role="alert">
            {{$flash}}
        </div>
    @endif

    <div class="default">
        <section class="content">
            @yield('content')
        </section>
    </div>

    @include('sections.footer')
</body>
</html>