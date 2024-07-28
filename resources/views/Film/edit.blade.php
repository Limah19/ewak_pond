@extends('layout.master')

@section('judul')
Edit film
@endsection

@section('content')
<form method="post" action="/film/{{ $film->id }}"> 
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" value="{{ $film->judul }}" class="form-control">
    </div>
    @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Ringkasan</label>
        <textarea class="form-control" name="ringkasan"> {{ $film->ringkasan }} </textarea>
    </div>
    @error('ringkasan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="tahun" value="{{ $film->tahun }}" class="form-control">
    </div>
    @error('tahun')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Poster</label>
        <input type="text" name="poster" value="{{ $film->poster }}" class="form-control">
    </div>
    @error('poster')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Genre</label>
        <select class="form-control" name="genre">
            <option value="">Pilih Genre</option>
            @foreach ($genre as $item)
                <option value="{{ $item->id }}" {{ $item->id == $film->genre_id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    @error('genre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection