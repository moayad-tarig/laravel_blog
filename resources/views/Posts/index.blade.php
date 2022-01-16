@extends('layouts.app')

@section('content')



<div class="jumbotron jumbotron-fluid bg-primary text-white">
<div class="container">
        <div class="container">
          <h1 class="display-4">Posts</h1>
          <a href="{{ route('post.create') }}" class="btn btn-success mb-2">Create Post</a>
          <a href="{{ route('tags') }}" class="btn btn-success mb-2 btn btn-warning">Tags</a>
          <a href="{{ route('posts.trashed') }}" class="btn btn-success mb-2 btn btn-danger">Trashes</a>
        </div>
        </div>
</div>

        <!-- body -->

        <div class="container">
            <div class="row mt-4">
                @if ($posts->count() > 0)
                @foreach ($posts as $post)
                <div class="col-sm mt-2">
                <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $post->photo }}" alt="Card image cap" width="286" height="160">
                            <div class="card-body">
                                <a href="{{ route('post.show', $post->slug) }}">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ str_limit($post->content, 15) }}</p>
                                  </a>
                                  <div>
                                    @foreach ($tags as $tag)
                                        @foreach ($post->tag as $p)
                                          @if ($p->id == $tag->id)
                                              
                                                <p style="display: inline">{{ $tag->name  }} - </p>
                                              
                                          @endif   
                                        @endforeach
                                       
                                    @endforeach
                                  </div>
                                    <a href="{{ route('post.edit',['id' => $post->id]) }}" class="btn btn-primary" class="btn btn-danger">Edit</a>
                                    <a href="{{ route('post.destroy',['id' => $post->id]) }}" class="btn btn-danger">Delete</a>
                              
                            </div>
                          </div>
                        </div>
                        @endforeach         
                @else
                    
                <div class="alert alert-danger" role="alert">
                    no posts
                 </div>

                @endif
            
            </div>
          </div>



          
      
    


@endsection