<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | JetBus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    <style>
        :root { --navy: #1a2744; --amber: #f59e0b; --slate: #f1f5f9; --text: #1e293b; --white: #ffffff; --radius: 8px; }
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: url('{{ asset('assets/img/login.jpeg') }}') no-repeat center center/cover; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem 0; }
        .login-card { background: var(--white); padding: 2.5rem; border-radius: var(--radius); box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 100%; max-width: 420px; }
        .login-logo { text-align: center; margin-bottom: 1.5rem; }
        .login-logo img { height: 40px; width: auto; }
        .form-label { color: var(--text); font-weight: 600; font-size: 0.85rem; margin-bottom: 0.35rem; }
        .form-control { border: 1px solid #cbd5e1; border-radius: var(--radius); padding: 0.65rem 0.875rem; font-size: 0.9rem; transition: all 0.15s; }
        .form-control:focus { border-color: var(--amber); box-shadow: 0 0 0 3px rgba(245,158,11,0.15); outline: none; }
        .form-text { font-size: 0.75rem; color: var(--text-muted); }
        .btn-primary { background: var(--amber); color: var(--navy); border: none; font-weight: 600; font-size: 0.9rem; padding: 0.65rem; border-radius: var(--radius); width: 100%; transition: background 0.15s; }
        .btn-primary:hover { background: #d97706; color: var(--navy); }
        .form-check-label { color: var(--text); font-size: 0.85rem; }
        .text-muted { font-size: 0.85rem; }
        .btn-link { color: var(--amber); font-weight: 500; font-size: 0.85rem; }
        .btn-link:hover { color: #d97706; text-decoration: none; }
        .text-center a { color: var(--amber); font-weight: 600; font-size: 0.85rem; }
        .text-center a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo"><img src="{{ asset('assets/img/logo.png') }}" alt="JetBus"></div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                {{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Email atau Nomor Telepon</label>
                <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}" placeholder="Masukkan email atau nomor telepon" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    <button type="button" class="input-group-text" id="togglePassword"><i class="bi bi-eye-slash"></i></button>
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                <label class="form-check-label" for="rememberMe">Ingat saya</label>
            </div>

            <div class="d-grid mb-3"><button type="submit" class="btn btn-primary">Masuk</button></div>
        </form>

        <div class="text-center">
            <p class="mb-1">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
            <p><a href="#" class="btn-link">Lupa password?</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>
