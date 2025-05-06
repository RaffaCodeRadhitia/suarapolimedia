<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SuaraPoliMedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow rounded-4">
                <div class="card-body p-4">
                    <h4 class="mb-4 text-center">Login ke SuaraPoliMedia</h4>

                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login') }}
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Mahasiswa</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        Belum punya akun? <a href="/register">Daftar di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
