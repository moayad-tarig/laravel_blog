@extends('layouts.app')

@section('content')



<div class="jumbotron jumbotron-fluid bg-danger text-white">
<div class="container">
        <div class="container">
          <h1 class="display-4">Truched Posts</h1>
            <a href="{{ route('posts') }}" class="btn btn-primary mb-2">All Posts</a>
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
                            <img class="card-img-top" src="{{ URL::asset($post->photo) }}" alt="Card image cap" width="286" height="160">
                            <div class="card-body">
                                <a href="{{ route('post.show', $post->slug) }}">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ str_limit($post->content, 15) }}</p>
                                </a>

                                    <a href="{{ route('post.restore',$post->id) }}" class="btn btn-primary">restore</a>

                                    <a class="text-danger" href="{{route('post.hdelete',[$post->id])}}"> Delete </a>
                              
                            </div>
                          </div>
                        </div>
                        @endforeach         
                @else
                    
                <div class="alert alert-danger" role="alert">
                   Empty Trash
                 </div>

                @endif
              
            
            </div>
          </div>



          
      
    


@endsection