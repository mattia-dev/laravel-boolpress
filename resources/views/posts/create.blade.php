@extends('layouts.app')

@section('content')
    <div class="container formatting-post-container">
        <h2>NEW POST</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>

                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="user_id">Author</label>
                    </div>
                    <select class="custom-select" id="user_id" name="user_id">
                        <option value="{{ old('user_id') ? old('user_id') : '' }}" selected>{{ old('user_id') ? $users->find(old('user_id'))->name : "Choose an author..." }}</option>
                            @foreach($users as $user)
                                @if($user->id != old('user_id'))
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Image URL:</label>

                <input type="text" class="form-control" name="image" id="image" value="{{ old('image') }}">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>

                <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
            </div>

            <div class="form-group">
                <label for="tags">Tags:</label>

                <input type="text" class="form-control" name="tags" id="tags" value="{{ old('tags') }}">
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