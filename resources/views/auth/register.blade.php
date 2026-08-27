<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | JetBus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    <style>
        :root { --navy: #1a2744; --amber: #f59e0b; --slate: #f1f5f9; --text: #1e293b; --white: #ffffff; --radius: 8px; }
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: url('{{ asset('assets/img/login.jpeg') }}') no-repeat center center/cover; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem 0; }
        .login-card { background: var(--white); padding: 2.5rem; border-radius: var(--radius); box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 100%; max-width: 460px; }
        .login-logo { text-align: center; margin-bottom: 1.5rem; }
        .login-logo img { height: 40px; width: auto; }
        .form-label { color: var(--text); font-weight: 600; font-size: 0.85rem; margin-bottom: 0.35rem; }
        .form-control { border: 1px solid #cbd5e1; border-radius: var(--radius); padding: 0.65rem 0.875rem; font-size: 0.9rem; transition: all 0.15s; }
        .form-control:focus { border-color: var(--amber); box-shadow: 0 0 0 3px rgba(245,158,11,0.15); outline: none; }
        .form-text { font-size: 0.75rem; color: var(--text-muted); }
        .btn-primary { background: var(--amber); color: var(--navy); border: none; font-weight: 600; font-size: 0.9rem; padding: 0.65rem; border-radius: var(--radius); width: 100%; transition: background 0.15s; }
        .btn-primary:hover { background: #d97706; color: var(--navy); }
        .text-center a { color: var(--amber); font-weight: 600; font-size: 0.85rem; }
        .text-center a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo"><img src="{{ asset('assets/img/logo.png') }}" alt="JetBus"></div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                @if($errors->has('email'))
                    <div class="form-text text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xx-xxxx-xxxx" required>
                @if($errors->has('phone'))
                    <div class="form-text text-danger">{{ $errors->first('phone') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 8 karakter" required>
                @if($errors->has('password'))
                    <div class="form-text text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">Saya menyetujui <a href="#" class="link-secondary">syarat & ketentuan</a></label>
                @if($errors->has('terms'))
                    <div class="form-text text-danger">{{ $errors->first('terms') }}</div>
                @endif
            </div>

            <div class="d-grid mb-3"><button type="submit" class="btn btn-primary">Daftar</button></div>
        </form>

        <div class="text-center"><p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
