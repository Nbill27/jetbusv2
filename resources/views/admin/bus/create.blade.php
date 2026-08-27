@extends('layouts.admin')
@section('title', 'Tambah Bus')
@section('content')
<div class="card"><div class="card-header"><h2>Tambah Bus</h2></div><div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.bus.store') }}">@csrf
        <div class="mb-3"><label class="form-label">No Plat</label><input type="text" name="no_plat" value="{{ old('no_plat') }}" required class="form-control" placeholder="B 1234 XX"></div>
        <div class="mb-3"><label class="form-label">Tipe Bus</label><select name="id_tipe" required class="form-select"><option value="">Pilih Tipe</option>@foreach($tipeBus as $t)<option value="{{ $t->id_tipe }}">{{ $t->nama_tipe }}</option>@endforeach</select></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.bus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
