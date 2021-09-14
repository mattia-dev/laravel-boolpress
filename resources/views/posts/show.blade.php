@extends('layouts.app')

@section('content')
    <div class="container">
        @if( $post->premium_content )
            <div class="premium">PREMIUM</div>
        @endif

        <h1>{{ $post->title }}</h1>

        <div class="author"><i class="bi bi-pen-fill"></i>{{ $post->author }}</div>

        <div class="post-details">
            <div class="publish-date"><i class="bi bi-calendar-check-fill"></i> {{ $post->publish_date }}</div>

            <div class="tags"><i class="bi bi-tags-fill"></i>{{ $post->tags }} {{$post->premium_content ? "premium" : "free"}}</div>

            <div class="views"><i class="bi bi-eye-fill"></i>Read {{ $post->views }} times</div>
        </div>

        <div class="clearfix">
            <img class="float-right" src="{{ $post->image }}" alt="post image">

            <p>{{ $post->body }}</p>
        </div>
    </div>
@endsection