<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SuaraPoliMedia</title>
    {{-- <link href="{{ asset('assets/style/style.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

.modern-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    transition: box-shadow 0.3s ease;
}

.modern-card:hover {
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
}


.modern-table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    font-size: 0.95rem;
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
}

.modern-table thead {
    background-color: #f8f9fa;
    color: #495057;
    font-weight: 600;
}

.modern-table th,
.modern-table td {
    vertical-align: middle;
    padding: 12px 16px;
    border-bottom: 1px solid #e9ecef;
}

.modern-table tbody tr:hover {
    background-color: #f1f3f5;
    transition: background-color 0.2s ease-in-out;
}


.modern-img {
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}


.modern-badge {
    display: inline-block;
    padding: 6px 12px;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 999px;
    text-transform: capitalize;
    transition: background-color 0.2s ease;
}

.bg-menunggu {
    background-color: #dee2e6;
    color: #495057;
}

.bg-diproses {
    background-color: #fff3cd;
    color: #856404;
}

.bg-selesai {
    background-color: #d1e7dd;
    color: #0f5132;
}


.modern-action {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    align-items: center; /* Penting untuk menyamakan tinggi */
    justify-content: flex-start;
}

.modern-action form {
    margin: 0 !important;
    padding: 0;
    display: inline-block;
}


@media (max-width: 768px) {
    .modern-action {
        flex-direction: column;
        gap: 0.5rem;
    }

    .modern-action .btn {
        width: 100%;
    }
}
    </style>

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
