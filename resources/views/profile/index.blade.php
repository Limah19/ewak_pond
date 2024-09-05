@extends('layout.master')

@section('judul')
    Profile Saya
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Profile Saya
    </div>
    <div class="card-body">
        <p><strong>Umur:</strong> {{ $profile->umur }}</p>
        <p><strong>Bio:</strong> {{ $profile->bio }}</p>
        <p><strong>Alamat:</strong> {{ $profile->alamat }}</p>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
@endsection
