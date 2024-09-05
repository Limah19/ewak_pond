@extends('layout.master')

@section('judul')
    Edit Profile
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Edit Profile
    </div>
    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" value="{{ $profile->umur }}" required>
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio" required>{{ $profile->bio }}</textarea>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $profile->alamat }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a href="{{ route('profile.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
