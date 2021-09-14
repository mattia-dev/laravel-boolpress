@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Publishing date</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Content Type</th>
                        <th scope="col">Post actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author }}</td>
                            <td>{{ $post->publish_date }}</td>
                            <td>{{ $post->tags }}</td>
                            <td>{{ $post->premium_content ? "Premium content" : "Free Content" }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}"><i class="bi bi-box-arrow-up-right"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection