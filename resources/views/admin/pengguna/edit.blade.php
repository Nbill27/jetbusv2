@extends('layouts.admin')
@section('title', 'Edit Pengguna')
@section('content')
<div class="card">
    <div class="card-header"><h2>Edit Pengguna</h2></div>
    <div class="card-body">
        @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ route('admin.pengguna.update', $pengguna) }}">@csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="name" value="{{ old('name', $pengguna->name) }}" required class="form-control"></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email', $pengguna->email) }}" required class="form-control"></div>
            <div class="mb-3"><label class="form-label">No HP</label><input type="text" name="no_hp" value="{{ old('no_hp', $pengguna->no_hp) }}" required class="form-control"></div>
            <div class="mb-3"><label class="form-label">Password (kosongkan jika tidak diubah)</label><input type="password" name="password" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Peran</label><select name="peran" class="form-select"><option value="pelanggan" {{ $pengguna->peran === 'pelanggan' ? 'selected' : '' }}>Pelanggan</option><option value="admin" {{ $pengguna->peran === 'admin' ? 'selected' : '' }}>Admin</option></select></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
