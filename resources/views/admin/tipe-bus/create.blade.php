@extends('layouts.admin')
@section('title', 'Tambah Tipe Bus')
@section('content')
<div class="card"><div class="card-header"><h2>Tambah Tipe Bus</h2></div><div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.tipe-bus.store') }}" enctype="multipart/form-data">@csrf
        <div class="mb-3"><label class="form-label">Nama Tipe</label><input type="text" name="nama_tipe" value="{{ old('nama_tipe') }}" required class="form-control"></div>
        <div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea></div>
        <div class="mb-3"><label class="form-label">Foto</label><input type="file" name="foto" accept="image/*" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.tipe-bus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
