@extends('layouts.pelanggan')
@section('title', 'Profil Pengguna')

@push('styles')
<style>
    .sidebar { height: 100vh; padding-top: 20px; position: sticky; top: 0; }
    .sidebar a { text-decoration: none; display: block; padding: 12px 20px; font-size: 1.1rem; transition: background-color 0.3s, padding-left 0.3s; }
    .sidebar a:hover { padding-left: 30px; }
    .form-control, .form-select { background-color: #fff; border: 1px solid #ccc; color: #333; font-size: 1rem; border-radius: 8px; padding: 10px; }
    .form-control:focus, .form-select:focus { background-color: #fff; border-color: #3498db; box-shadow: 0 0 0 0.2rem rgba(52,152,219,0.25); }
    .btn-primary:hover { background-color: #2980b9; }
    .profile-section h3 { color: #2c3e50; font-size: 1.8rem; font-weight: bold; margin-bottom: 20px; }
    .profile-section label { font-weight: 500; }
    .profile-section .form-control { margin-bottom: 15px; }
    @media (max-width: 768px) { .sidebar { display: none; } .main-content { margin-left: 0; } .profile-section h3 { font-size: 1.6rem; } .container { margin-top: 0; } }
</style>
@endpush

@section('content')
<div class="container my-4 shadow-lg border">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar bg-light border-end">
            <a href="#profil">Profil</a>
            <a href="#ubahPassword">Ubah Password</a>
            <a href="#riwayatPemesanan">Riwayat Pemesanan</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 py-4 main-content">
            <!-- Profil Section -->
            <div class="profile-section">
                <h3 id="profil">Profil Anda</h3>
                @if(session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                @if($errors->has('name') || $errors->has('email') || $errors->has('no_hp'))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)<p class="mb-0">{{ $error }}</p>@endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('pelanggan.profil.update') }}">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="firstName" name="name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No.HP</label>
                        <input type="number" class="form-control" id="phone" name="no_hp" value="{{ auth()->user()->no_hp }}">
                    </div>
                    <button type="submit" name="updateProfile" class="btn btn-primary">Simpan</button>
                </form>
            </div>

            <hr class="my-4">

            <!-- Ubah Password Section -->
            <div class="profile-section">
                <h3 id="ubahPassword">Ubah Password</h3>
                @if(session('password_success'))
                    <p class="text-success">{{ session('password_success') }}</p>
                @endif
                @if($errors->has('current_password') || $errors->has('password'))
                    <p class="text-danger">{{ $errors->first('current_password') ?? $errors->first('password') }}</p>
                @endif
                <form method="POST" action="{{ route('pelanggan.profil.password') }}">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="currentPassword" name="current_password" placeholder="Masukkan password lama">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="newPassword" name="password" placeholder="Masukkan password baru">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Masukkan password baru lagi">
                    </div>
                    <button type="submit" name="updatePassword" class="btn btn-primary">Simpan</button>
                </form>
            </div>

            <hr class="my-4">

            <!-- Riwayat Pemesanan Section -->
            <div class="profile-section">
                <h3 id="riwayatPemesanan">Riwayat Pemesanan</h3>
                @if($riwayat->count() > 0)
                    <table class="table" id="tabelRiwayatPemesanan">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Status Pembayaran</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat as $row)
                                <tr>
                                    <td>{{ $row->id_transaksi }}</td>
                                    <td>{{ ucfirst($row->status) }}</td>
                                    <td>Rp {{ number_format($row->total, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('pelanggan.invoice', $row) }}" class="btn btn-primary btn-sm">
                                            Lihat Tiket
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Tidak ada riwayat pemesanan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
