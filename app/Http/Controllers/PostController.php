<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

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
        $users = User::all();
        return view('posts.create', compact('users'));
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
            'user_id' => 'required',
            'image' => 'url',
            'body'  => 'required',
            'tags'  => 'required'
        ]);

        $data = $request->all();

        $post = new Post();

        $this->createOrEditPost($post, $data);

        \Session::flash('flash_message_store','POST CREATED.');

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = Post::All();
        $post->incrementViewsCount();
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
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
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
        // dd($request);
        $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'image' => 'url',
            'body'  => 'required',
            'tags'  => 'required'
        ]);

        $data = $request->all();

        $this->createOrEditPost($post, $data);

        \Session::flash('flash_message_update','POST EDITED.');

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
        $post->user_id = $data['user_id'];
        $post->image = $data['image'];
        $post->body = $data['body'];
        $post->tags = $data['tags'];
        $post->views = $post['views'] ? $post['views'] : 0;
        $post->premium_content = key_exists('premium', $data) ? true : false;
        $post->save();
    }
}