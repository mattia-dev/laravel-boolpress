@extends('layouts.app')

@section('content')
    <div class="post-container container">
        @if(Session::has('flash_message_store'))
            <div id="deleted" class="alert alert-success" role="alert" style="position: fixed; left: 50%; transform: translate(-50%, 0)">
                <strong>POST CREATED</strong>
            </div>
        @endif

        @if(Session::has('flash_message_update'))
            <div id="deleted" class="alert alert-warning" role="alert" style="position: fixed; left: 50%; transform: translate(-50%, 0)">
                <strong>POST EDITED</strong>
            </div>
        @endif
        
        @if(Auth::check())
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary mb-4">Torna al gestionale dei post</a>
        @endif

        <img class="banner" src="{{ $post->image }}" alt="banner">

        @if( $post->premium_content )
            <div class="premium">PREMIUM</div>
        @endif

        <h1>{{ substr($post->title, 0, -1) }}</h1>

        <div class="author"><i class="bi bi-pen-fill"></i>Written by {{ ucwords($post->user->name) }}</div>

        <div class="post-details d-flex justify-content-between">

            @if($post->created_at == $post->updated_at)
                <div class="publish-date">
                    <i class="bi bi-calendar-check-fill"></i>
                    
                    <div>Published on {{ date('d F Y', strtotime($post->created_at)) }} at {{ date('H:i', strtotime($post->created_at)) }}</div>
                </div>
            @else
                <div class="publish-date d-flex">
                    <i class="bi bi-calendar-check-fill"></i>

                    <div>Published on {{ date('d F Y', strtotime($post->created_at)) }} at {{ date('H:i', strtotime($post->created_at)) }}<br/>Updated on {{ date('d F Y', strtotime($post->updated_at)) }} at {{ date('H:i', strtotime($post->updated_at)) }}</div>
                </div>
            @endif

            <div class="tags"><i class="bi bi-tags-fill"></i>{{ ucwords(implode(', ', explode(' ', $post->tags))) }}{{$post->premium_content ? ", Premium" : "free"}}</div>

            <div class="views"><i class="bi bi-eye-fill"></i>Read {{ $post->views }} times</div>
        </div>

        <div class="post-body clearfix">
            <img class="float-right" src="{{ $post->image }}" alt="post image">

            <p>{{ $post->body }}</p>
        </div>

        <div class="comment-section">
            <h3>COMMENTS</h3>

            <form>
                <div class="input-group mb-3">
                    <span class="input-group-text">Username</span>
                    <input type="text" class="form-control">

                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control">
                </div>

                <textarea class="form-control mb-3" rows="5"></textarea>

                <button type="submit" class="btn btn-primary">Comment</button>
            </form>
        </div>
    </div>
@endsection