<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | JetBus Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    <style>
        :root {
            --navy: #1a2744;
            --navy-light: #243356;
            --navy-hover: #1e3056;
            --slate: #f1f5f9;
            --amber: #f59e0b;
            --text: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
        }
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background: var(--slate); color: var(--text); margin: 0; }
        .sidebar { min-height: 100vh; background: var(--navy); color: rgba(255,255,255,0.85); width: 240px; padding-top: 1rem; transition: width 0.2s; position: fixed; left: 0; top: 0; z-index: 1000; }
        .sidebar-brand { text-align: center; padding: 0.5rem 1rem 1.5rem; }
        .sidebar-brand img { height: 32px; width: auto; }
        .sidebar a { color: rgba(255,255,255,0.8); text-decoration: none; padding: 0.65rem 1.25rem; display: flex; align-items: center; gap: 0.75rem; font-size: 0.875rem; font-weight: 500; transition: all 0.15s; border-left: 3px solid transparent; }
        .sidebar a i { font-size: 1.1rem; width: 20px; text-align: center; }
        .sidebar a:hover { background: var(--navy-hover); color: var(--white); border-left-color: var(--amber); }
        .sidebar a.active { background: var(--navy-hover); color: var(--amber); border-left-color: var(--amber); }
        .sidebar.collapsed { width: 64px; }
        .sidebar.collapsed a span { display: none; }
        .sidebar.collapsed a { justify-content: center; padding: 0.65rem; }
        .sidebar.collapsed .sidebar-brand img { height: 24px; }

        .main-wrapper { margin-left: 240px; transition: margin-left 0.2s; min-height: 100vh; }
        .main-wrapper.expanded { margin-left: 64px; }

        .topbar { background: var(--white); border-bottom: 1px solid #e2e8f0; padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 1rem; }
        .topbar .btn-toggle { border: 1px solid #e2e8f0; color: var(--text-muted); padding: 0.4rem 0.6rem; border-radius: 6px; background: var(--white); }
        .topbar .btn-toggle:hover { background: var(--slate); color: var(--text); }
        .topbar .page-title { font-weight: 600; font-size: 1.1rem; color: var(--navy); }

        .content { padding: 1.5rem; }

        .card { border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.04); }

        .btn-primary { background: var(--amber); border-color: var(--amber); color: var(--navy); font-weight: 600; font-size: 0.875rem; border-radius: 6px; }
        .btn-primary:hover { background: #d97706; border-color: #d97706; color: var(--navy); }
        .btn-outline-primary { color: var(--amber); border-color: var(--amber); font-weight: 500; font-size: 0.875rem; border-radius: 6px; }
        .btn-outline-primary:hover { background: var(--amber); color: var(--navy); }
        .btn-danger { border-radius: 6px; font-weight: 500; font-size: 0.875rem; }

        .table { font-size: 0.875rem; }
        .table thead th { background: var(--slate); font-weight: 600; color: var(--text-muted); text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; border-bottom: 2px solid #e2e8f0; }

        @media (max-width: 767px) {
            .sidebar { width: 200px; }
            .main-wrapper { margin-left: 200px; }
            .sidebar.collapsed { width: 56px; }
            .main-wrapper.expanded { margin-left: 56px; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/img/logo.png') }}" alt="JetBus">
        </div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.pengguna.index') }}" class="{{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> <span>Pengguna</span>
        </a>
        <a href="{{ route('admin.bus.index') }}" class="{{ request()->routeIs('admin.bus.*') ? 'active' : '' }}">
            <i class="bi bi-bus-front"></i> <span>Bus</span>
        </a>
        <a href="{{ route('admin.tipe-bus.index') }}" class="{{ request()->routeIs('admin.tipe-bus.*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i> <span>Tipe Bus</span>
        </a>
        <a href="{{ route('admin.rute.index') }}" class="{{ request()->routeIs('admin.rute.*') ? 'active' : '' }}">
            <i class="bi bi-map"></i> <span>Rute</span>
        </a>
        <a href="{{ route('admin.jadwal.index') }}" class="{{ request()->routeIs('admin.jadwal.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-check"></i> <span>Jadwal</span>
        </a>
        <a href="{{ route('admin.tiket.index') }}" class="{{ request()->routeIs('admin.tiket.*') ? 'active' : '' }}">
            <i class="bi bi-ticket-perforated"></i> <span>Tiket</span>
        </a>
        <a href="{{ route('admin.bangku.index') }}" class="{{ request()->routeIs('admin.bangku.*') ? 'active' : '' }}">
            <i class="bi bi-grid-3x3"></i> <span>Bangku</span>
        </a>
        <a href="{{ route('admin.transaksi.index') }}" class="{{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}">
            <i class="bi bi-cash-stack"></i> <span>Transaksi</span>
        </a>
        <a href="{{ route('admin.laporan') }}" class="{{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i> <span>Laporan</span>
        </a>
        <div class="mt-3 border-top border-secondary pt-2">
            <a href="{{ route('home') }}">
                <i class="bi bi-arrow-left"></i> <span>Kembali ke Situs</span>
            </a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
            </a>
        </div>
    </aside>

    <div class="main-wrapper" id="mainWrapper">
        <div class="topbar">
            <button class="btn-toggle" id="btnToggleSidebar"><i class="bi bi-list"></i></button>
            <span class="page-title">@yield('title', 'Dashboard')</span>
            <div class="ms-auto d-flex align-items-center gap-2">
                <span class="text-muted small">{{ auth()->user()->name }}</span>
            </div>
        </div>

        @if(session('success'))
            <div class="px-3 pt-3">
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="px-3 pt-3">
                <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <main class="content">
            @yield('content')
        </main>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin logout?</div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        document.getElementById('btnToggleSidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('mainWrapper').classList.toggle('expanded');
        });
        $(document).ready(function() {
            $('#tablePengguna, #tableBus, #tableRute, #tableJadwal, #tableTiket, #tableTransaksi, #tableTipeBus, #tableBangku').DataTable({
                language: { search: 'Cari:', lengthMenu: 'Tampilkan _MENU_ data', info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data' }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
