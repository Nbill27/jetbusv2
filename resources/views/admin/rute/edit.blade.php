@extends('layouts.admin')
@section('title', 'Edit Rute')
@section('content')
<div class="card"><div class="card-header"><h2>Edit Rute</h2></div><div class="card-body">
    <form method="POST" action="{{ route('admin.rute.update', $rute) }}">@csrf @method('PUT')
        <div class="mb-3"><label class="form-label">Lokasi Asal</label><input type="text" name="lokasi_asal" value="{{ old('lokasi_asal', $rute->lokasi_asal) }}" required class="form-control"></div>
        <div class="mb-3"><label class="form-label">Lokasi Tujuan</label><input type="text" name="lokasi_tujuan" value="{{ old('lokasi_tujuan', $rute->lokasi_tujuan) }}" required class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.rute.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
