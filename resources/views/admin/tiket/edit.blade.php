@extends('layouts.admin')
@section('title', 'Edit Tiket')
@section('content')
<div class="card"><div class="card-header"><h2>Edit Harga Tiket</h2></div><div class="card-body">
    <form method="POST" action="{{ route('admin.tiket.update', $tiket) }}">@csrf @method('PUT')
        <div class="mb-3"><label class="form-label">Rute</label><select name="id_rute" required class="form-select">@foreach($rute as $r)<option value="{{ $r->id_rute }}" {{ $tiket->id_rute == $r->id_rute ? 'selected' : '' }}>{{ $r->lokasi_asal }} → {{ $r->lokasi_tujuan }}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Tipe Bus</label><select name="id_tipe" required class="form-select">@foreach($tipeBus as $t)<option value="{{ $t->id_tipe }}" {{ $tiket->id_tipe == $t->id_tipe ? 'selected' : '' }}>{{ $t->nama_tipe }}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Harga (Rp)</label><input type="number" name="harga" value="{{ old('harga', $tiket->harga) }}" required min="0" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.tiket.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
