@extends('layouts.app')

@section('content')
    <div class="container create-post-container">
        <h2>NEW POST</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>

                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="author">Author:</label>

                <input type="text" class="form-control" name="author" id="author">
            </div>

            <div class="form-group">
                <label for="image-url">Image URL:</label>

                <input type="text" class="form-control" name="image-url" id="image-url">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>

                <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="tags">Tags:</label>

                <input type="text" class="form-control" name="tags" id="tags">
            </div>

            <div class="form-group d-flex align-items-center">
                <label for="premium" class="mr-2 mb-0">Premium content:</label>

                <input type="checkbox" id="premium" name="premium">
            </div>

            <div class="form-group clearfix">
                <button class="btn btn-outline-primary" type="submit">Create post</button>
            </div>
        </form>
    </div>
@endsection