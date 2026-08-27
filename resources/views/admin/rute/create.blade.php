@extends('layouts.admin')
@section('title', 'Tambah Rute')
@section('content')
<div class="card"><div class="card-header"><h2>Tambah Rute</h2></div><div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.rute.store') }}">@csrf
        <div class="mb-3"><label class="form-label">Lokasi Asal</label><input type="text" name="lokasi_asal" value="{{ old('lokasi_asal') }}" required class="form-control"></div>
        <div class="mb-3"><label class="form-label">Lokasi Tujuan</label><input type="text" name="lokasi_tujuan" value="{{ old('lokasi_tujuan') }}" required class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.rute.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
