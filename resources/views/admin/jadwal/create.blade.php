@extends('layouts.admin')
@section('title', 'Tambah Jadwal')
@section('content')
<div class="card"><div class="card-header"><h2>Tambah Jadwal</h2></div><div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.jadwal.store') }}">@csrf
        <div class="mb-3"><label class="form-label">Bus</label><select name="id_bus" required class="form-select"><option value="">Pilih Bus</option>@foreach($buses as $b)<option value="{{ $b->id_bus }}">{{ $b->no_plat }} ({{ $b->tipeBus->nama_tipe ?? '' }})</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Rute</label><select name="id_rute" required class="form-select"><option value="">Pilih Rute</option>@foreach($rute as $r)<option value="{{ $r->id_rute }}">{{ $r->lokasi_asal }} → {{ $r->lokasi_tujuan }}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Tanggal Berangkat</label><input type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}" required class="form-control"></div>
        <div class="mb-3"><label class="form-label">Waktu Berangkat</label><input type="time" name="waktu_berangkat" value="{{ old('waktu_berangkat') }}" required class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
