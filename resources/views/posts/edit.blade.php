@extends('layouts.app')
@section('content')
    <div class="m-4">
        <div class="card">
            <div class="card-header">
                Edt Postingan
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('posts.update', $post->id)}}" method="post">
                @csrf
                @method('put')
        <div class="mt-3">
            <label for="">Title</label>
            <input type="text" class="form-control" placeholder="Enter Title Post" name="title" value="{{$post->title}}" >
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mt-3">
            <label for="">Body</label>
            <textarea type="text" class="form-control" placeholder="Enter Content Post" name="body">{{$post->body}}</textarea>
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="float-end mt-3">
            <a href="{{route('dashboard')}}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui Postingan</button>
        </div>
            </form>
    </div>
@endsection