<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::All();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'url',
            'body'  => 'required',
            'tags'  => 'required'
        ]);

        $data = $request->all();

        $post = new Post();

        $this->createOrEditPost($post, $data);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $posts = Post::All();
        return view('posts.show', compact('post', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'url',
            'body'  => 'required',
            'tags'  => 'required'
        ]);

        $data = $request->all();

        $this->createOrEditPost($post, $data);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        \Session::flash('flash_message','POST DELETED.');

        return redirect()->route('posts.index');
    }

    private function createOrEditPost(Post $post, $data) {
        $post->title = $data['title'];
        $post->author = $data['author'];
        $post->publish_date = now();
        $post->image = $data['image'];
        $post->body = $data['body'];
        $post->tags = $data['tags'];
        $post->views = 0;
        $post->premium_content = key_exists('premium', $data) ? true : false;
        $post->save();
    }
}