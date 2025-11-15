@extends('layouts.app')
@section('content')
    <div class="m-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h4>Selamat datang, {{ Auth::user()->nama }}</h4>
                <p class='m-0'>Email: {{ Auth::user()->email }}</p>
                <p class="m-0">Username: {{ Auth::user()->username }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="{{route('posts.create')}}" class="btn btn-success">Buat Postingan</a>
            <form action="{{route('dashboard')}}" method="GET">
                <input type="text" name="keyword" class="form-control" value="{{old('keyword')}}" placeholder="Cari Postingan...">
            </form>
        </div>
        <div class="mt-4 mb-4">
            <h3>Daftar Postingan Anda</h3>
        @foreach($posts as $post)
        <div class="card mt-3">
            <div class="card-header">
                <div class="card-title">
                    {{ $post->user->nama }} <br>
                    <small>{{$post->user->email}}</small>
                </div>                
            </div>
            <div class="card-body">
                <h4>{{ $post->title }}</h4>
                <p>{{ $post->body }}</p>
            </div>
            <div class="card-footer pull-end">
                @if($post->user_id == Auth::user()->id)
                    <form action="{{route('posts.delete',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus Postingan</button>
                    </form>
                @endif
            </div>
        </div>
        @endforeach
        </div>
    </div>
    <br>
    </br>
@endsection