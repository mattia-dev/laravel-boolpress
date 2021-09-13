@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="posts">
        @foreach($allPosts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <div class="author">by {{ $post->author }}</div>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection