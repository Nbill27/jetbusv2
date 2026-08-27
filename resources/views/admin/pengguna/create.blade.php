@extends('layouts.admin')
@section('title', 'Tambah Pengguna')
@section('content')
<div class="card">
    <div class="card-header"><h2>Tambah Pengguna</h2></div>
    <div class="card-body">
        @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ route('admin.pengguna.store') }}">@csrf
            <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="name" value="{{ old('name') }}" required class="form-control"></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email') }}" required class="form-control"></div>
            <div class="mb-3"><label class="form-label">No HP</label><input type="text" name="no_hp" value="{{ old('no_hp') }}" required class="form-control"></div>
            <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" required class="form-control"></div>
            <div class="mb-3"><label class="form-label">Peran</label><select name="peran" class="form-select"><option value="pelanggan">Pelanggan</option><option value="admin">Admin</option></select></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
