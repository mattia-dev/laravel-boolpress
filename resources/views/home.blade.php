@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Auth::check())
            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary mb-4">Apri il gestionale dei post</a>
        @endif
        
        <div class="row row-cols-2 row-cols-md-3 g-4">
            @foreach($posts as $post)
                <div class="col mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap">

                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->user->name }}</p>
                            <p class="card-text">{{ $post->created_at }}</p>
                            <p class="card-text"><strong>{{ $post->tags }}</strong></p>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary">Read</a>

                            @if(Auth::check())
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-warning">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>        
    </div>
@endsection