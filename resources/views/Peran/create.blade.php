@extends('layout.master')

@section('judul')
Tambah Peran
@endsection

@section('content')
<form method="post" action="/peran"> 
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Film</label>
        <select class="form-control" name="film">
            <option value="">Pilih Film</option>
            @foreach ($film as $item)
            <option value="{{ $item['id'] }}">{{ $item['judul'] }}</option>
            @endforeach
        </select>
    </div>
    @error('film')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Cast</label>
        <select class="form-control" name="film">
            <option value="">Pilih Cast</option>
            @foreach ($film as $item)
            <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
            @endforeach
        </select>
    </div>
    @error('cast')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection