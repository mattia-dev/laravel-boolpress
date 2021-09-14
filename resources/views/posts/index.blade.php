@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <ul>
            <li>{{ $post->title }}</li>
            <li>written by {{ $post->author }}</li>
            <li>{{ $post->publish_date }}</li>
            <li><img src="{{ $post->image }}" alt="post image"></li>
            <li>{{ $post->body }}</li>
        </ul>
    @endforeach
</div>
@endsection