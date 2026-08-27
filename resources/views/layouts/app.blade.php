<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'JetBus') | JetBus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    <style>
        :root {
            --navy: #1a2744;
            --navy-light: #243356;
            --slate: #f1f5f9;
            --slate-border: #e2e8f0;
            --amber: #f59e0b;
            --amber-hover: #d97706;
            --text: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --radius: 6px;
        }
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; color: var(--text); background: var(--white); }
        .navbar { background: var(--navy); padding: 0.75rem 0; }
        .navbar-brand { font-weight: 700; font-size: 1.25rem; color: var(--white) !important; letter-spacing: -0.02em; }
        .navbar-brand img { height: 36px; width: auto; }
        .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem !important; transition: color 0.15s; }
        .nav-link:hover, .nav-link.active { color: var(--amber) !important; }
        .btn-nav { background: var(--amber); color: var(--navy); font-weight: 600; font-size: 0.875rem; border: none; padding: 0.5rem 1.25rem; border-radius: var(--radius); transition: background 0.15s; }
        .btn-nav:hover { background: var(--amber-hover); color: var(--navy); }
        .dropdown-menu { border: 1px solid var(--slate-border); border-radius: var(--radius); box-shadow: 0 4px 16px rgba(0,0,0,0.08); padding: 0.5rem 0; }
        .dropdown-item { font-size: 0.875rem; padding: 0.5rem 1rem; font-weight: 500; }
        .dropdown-item:hover { background: var(--slate); color: var(--navy); }
        .navbar-toggler { border-color: rgba(255,255,255,0.3); }
        .navbar-toggler-icon { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255,255,255,0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); }

        footer { background: var(--navy); color: rgba(255,255,255,0.7); padding: 3rem 0 1.5rem; font-size: 0.875rem; }
        footer h5 { color: var(--white); font-weight: 600; font-size: 0.95rem; margin-bottom: 1rem; }
        footer a { color: rgba(255,255,255,0.65); text-decoration: none; transition: color 0.15s; }
        footer a:hover { color: var(--amber); }
        footer hr { border-color: rgba(255,255,255,0.1); }

        @media (max-width: 767px) {
            .navbar { padding: 0.5rem 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="JetBus">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('armada') }}">Armada</a></li>
                            <li><a class="dropdown-item" href="{{ route('agen') }}">Agen</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-lg-2">
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a class="btn btn-nav" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            @else
                                <a class="btn btn-nav" href="{{ route('pelanggan.dashboard') }}">Dashboard</a>
                            @endif
                        @else
                            <a class="btn btn-nav" href="{{ route('login') }}">Masuk</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @yield('content')

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <h5>JetBus</h5>
                    <p class="mb-0">Pemesanan tiket bus cepat, mudah, dan terpercaya untuk perjalanan Anda ke seluruh Indonesia.</p>
                </div>
                <div class="col-md-3">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="mb-1"><a href="{{ route('about') }}">Tentang</a></li>
                        <li class="mb-1"><a href="{{ route('armada') }}">Armada</a></li>
                        <li><a href="{{ route('agen') }}">Agen</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><a href="mailto:info@jetbus.id">info@jetbus.id</a></li>
                        <li><a href="tel:+62811123456">+62 811-123-456</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} JetBus. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    @stack('scripts')
</body>
</html>
