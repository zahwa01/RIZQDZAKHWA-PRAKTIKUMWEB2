<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostPostsRequest;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostPostsRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Posts::create($input);
        return redirect()->route('dashboard')->with('success', 'Data Berahasil Disimpan');
    }

    public function edit($id)
    {
        $post = Posts::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = Posts::find($id);
        $post->update($input);
        return redirect()->route('dashboard')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
