@extends('layouts.app')

@section('content')
    <!-- <script>var myModal = new bootstrap.Modal(document.getElementById('myModal'), options)</script> -->

    <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>POST DELETED</strong>
            </div>
        @endif

        <a class="create-post" href="{{ route('posts.create') }}"><i class="bi bi-file-earmark-plus-fill"></i>Create New Post</a>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="text-white">
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
                            <td>
                                <div class="d-flex">
                                    <form class="mr-1 ml-1" action="{{ route('posts.show', $post) }}" method="GET">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </button>
                                    </form>
                                    
                                    <form class="edit mr-1 ml-1" action="{{ route('posts.edit', $post) }}" method="GET">
                                        <button type="submit" class="btn btn-outline-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </form>

                                    <!-- <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-id='{{$post}}' data-bs-target="#myModal">
                                        <i class="bi bi-trash"></i>
                                    </button> -->
                                    
                                    <form class="mr-1 ml-1" action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <!-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ATTENTION</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    Are you sure you want to delete this post?
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                    <form class="mr-1 ml-1" action="{{ route('posts.destroy', $post) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection