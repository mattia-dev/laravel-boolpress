@extends('layouts.app')

@section('content')
    <div class="container formatting-post-container">
        <h2>EDIT POST</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf

            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>

                <input type="text" class="form-control" name="title" id="title" value="{{ $post['title'] }}">
            </div>

            <div class="form-group">
                <label for="author">Author:</label>

                <input type="text" class="form-control" name="author" id="author" value="{{ $post['author'] }}">
            </div>

            <div class="form-group">
                <label for="image">Image URL:</label>

                <input type="text" class="form-control" name="image" id="image" value="{{ $post['image'] }}">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>

                <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $post['body'] }}</textarea>
            </div>

            <div class="form-group">
                <label for="tags">Tags:</label>

                <input type="text" class="form-control" name="tags" id="tags" value="{{ $post['tags'] }}">
            </div>

            <div class="form-group d-flex align-items-center">
                <label for="premium" class="mr-2 mb-0">Premium content:</label>

                <input type="checkbox" id="premium" name="premium" {{ $post['premium_content'] ? 'checked' : '' }}>
            </div>

            <div class="form-group clearfix">
                <button class="btn btn-outline-primary" type="submit">Save post</button>
            </div>
        </form>
    </div>
@endsection