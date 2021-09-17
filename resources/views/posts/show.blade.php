@extends('layouts.app')

@section('content')
    <div class="post-container container">
        <img class="banner" src="{{ $post->image }}" alt="banner">

        @if( $post->premium_content )
            <div class="premium">PREMIUM</div>
        @endif

        <h1>{{ substr($post->title, 0, -1) }}</h1>

        <div class="author"><i class="bi bi-pen-fill"></i>Written by {{ ucwords($post->author) }}</div>

        <div class="post-details d-flex justify-content-between">
            <div class="publish-date"><i class="bi bi-calendar-check-fill"></i>Published on {{ date('d F Y', strtotime($post->publish_date)) }} at {{ date('H:i', strtotime($post->publish_date)) }}</div>

            <div class="tags"><i class="bi bi-tags-fill"></i>{{ ucwords(implode(', ', explode(' ', $post->tags))) }}{{$post->premium_content ? ", Premium" : "free"}}</div>

            <div class="views"><i class="bi bi-eye-fill"></i>Read {{ $post->views }} times</div>
        </div>

        <div class="post-body clearfix">
            <img class="float-right" src="{{ $post->image }}" alt="post image">

            <p>{{ $post->body }}</p>
        </div>

        <div class="navigation d-flex justify-content-between">        
            <a class="d-flex" href="{{ route('posts.show', $post->id - 1) }}">
                <i class="{{ $post->id != 1 ? '' : 'd-none' }} bi bi-caret-left-fill"></i>
                <div>{{ $post->id != 1 ? "Previous blog post" : "" }}</div>
            </a>
        
            <a class="d-flex" href="{{ route('posts.show', $post->id + 1) }}">
                <div>{{ $post->id != count($posts) ? "Next blog post" : "" }}</div>
                <i class="{{ $post->id != count($posts) ? '' : 'd-none' }} bi bi-caret-right-fill"></i>
            </a>
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