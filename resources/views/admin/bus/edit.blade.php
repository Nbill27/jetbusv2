@extends('layouts.admin')
@section('title', 'Edit Bus')
@section('content')
<div class="card"><div class="card-header"><h2>Edit Bus</h2></div><div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.bus.update', $bus) }}">@csrf @method('PUT')
        <div class="mb-3"><label class="form-label">No Plat</label><input type="text" name="no_plat" value="{{ old('no_plat', $bus->no_plat) }}" required class="form-control"></div>
        <div class="mb-3"><label class="form-label">Tipe Bus</label><select name="id_tipe" required class="form-select">@foreach($tipeBus as $t)<option value="{{ $t->id_tipe }}" {{ $bus->id_tipe == $t->id_tipe ? 'selected' : '' }}>{{ $t->nama_tipe }}</option>@endforeach</select></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.bus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
