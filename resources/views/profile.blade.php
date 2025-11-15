@extends('layouts.app')
@section('content')
    <div class="card-body">
        <div class="card-body">
            <div class="text-center">
                <h1>Ini Profil</h1>
                <p>Selamat datang, {{ Auth::user()->nama }}</p>
                <a href="/" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
@endsection