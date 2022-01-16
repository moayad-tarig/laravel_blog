@extends('layouts.app')

@section('content')



<div class="jumbotron jumbotron-fluid bg-warning text-white">
<div class="container">
        <div class="container">
          <h1 class="display-4">Tags</h1>
          <a href="{{ route('tag.create') }}" class="btn btn-success mb-2">Create Tags</a>
           <a href="{{ route('posts') }} " class="btn btn-primary mb-2"> ALL Posts</a>

        </div>
        </div>
</div>

        <!-- body -->

        <div class="container">
            <div class="row mt-4">
                @if ($tags->count() > 0)
                @foreach ($tags as $tag)
                <div class="col-sm mt-2">
                <div class="card" style="width: 18rem;">
                           
                            <div class="card-body">
                               
                                    <h5 class="card-title">{{ $tag->name }}</h5>
                                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary" class="btn btn-danger">Edit</a>
                                    <a href="{{ route('tag.destroy', $tag->id) }}" class="btn btn-primary" class="btn btn-danger">Delete</a>
                                   
                            </div>
                          </div>
                        </div>
                        @endforeach         
                @else
                    
                <div class="alert alert-danger" role="alert">
                    no tags
                 </div>

                @endif
            
            </div>
          </div>



          
      
    


@endsection