@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="jumbotron jumbotron-fluid bg-dark text-white">
        <div class="container">
          <h1 class="display-4">Posts</h1>
          <a href="{{ route('post.create') }}" class="btn btn-success mb-2">Create Post</a>
          <a href="{{ route('posts.trashed') }}" class="btn btn-success mb-2">Trashes</a>
        </div>
        </div> --}}
</div>

<div class="container">

    <div class="card mt-3" style="">
        <img class="card-img-top" style="object-fit:contain" src="{{ URL::asset($post->photo) }}" alt="Card image cap" width="500px" height="500px">
        <div class="card-body d-flex justify-content-center align-item-center text-center flex-column">
            <h5 class="card-title ">{{ $post->title }}</h5>
            <p class="card-text ">{{ $post->content }}</p>
            <a href="{{ route('posts') }}" class="btn btn-primary ">Go Back</a>
        </div>
    </div>
</div>

  
@endsection