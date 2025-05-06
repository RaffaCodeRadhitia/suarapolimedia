<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SuaraPoliMedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="{{ url('/') }}">SuaraPoliMedia</a>

        <form action="{{ route('logout') }}" method="POST" class="d-flex ms-auto">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
        </form>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
