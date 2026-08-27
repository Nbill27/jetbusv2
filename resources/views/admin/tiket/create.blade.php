@extends('layouts.admin')
@section('title', 'Tambah Tiket')
@section('content')
<div class="card"><div class="card-header"><h2>Tambah Harga Tiket</h2></div><div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.tiket.store') }}">@csrf
        <div class="mb-3"><label class="form-label">Rute</label><select name="id_rute" required class="form-select"><option value="">Pilih Rute</option>@foreach($rute as $r)<option value="{{ $r->id_rute }}">{{ $r->lokasi_asal }} → {{ $r->lokasi_tujuan }}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Tipe Bus</label><select name="id_tipe" required class="form-select"><option value="">Pilih Tipe</option>@foreach($tipeBus as $t)<option value="{{ $t->id_tipe }}">{{ $t->nama_tipe }}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Harga (Rp)</label><input type="number" name="harga" value="{{ old('harga') }}" required min="0" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.tiket.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
