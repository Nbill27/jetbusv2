@extends('layouts.admin')
@section('title', 'Edit Jadwal')
@section('content')
<div class="card"><div class="card-header"><h2>Edit Jadwal</h2></div><div class="card-body">
    <form method="POST" action="{{ route('admin.jadwal.update', $jadwal) }}">@csrf @method('PUT')
        <div class="mb-3"><label class="form-label">Bus</label><select name="id_bus" required class="form-select">@foreach($buses as $b)<option value="{{ $b->id_bus }}" {{ $jadwal->id_bus == $b->id_bus ? 'selected' : '' }}>{{ $b->no_plat }} ({{ $b->tipeBus->nama_tipe ?? '' }})</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Rute</label><select name="id_rute" required class="form-select">@foreach($rute as $r)<option value="{{ $r->id_rute }}" {{ $jadwal->id_rute == $r->id_rute ? 'selected' : '' }}>{{ $r->lokasi_asal }} → {{ $r->lokasi_tujuan }}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Tanggal Berangkat</label><input type="date" name="tanggal_berangkat" value="{{ $jadwal->tanggal_berangkat->format('Y-m-d') }}" required class="form-control"></div>
        <div class="mb-3"><label class="form-label">Waktu Berangkat</label><input type="time" name="waktu_berangkat" value="{{ $jadwal->waktu_berangkat }}" required class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
