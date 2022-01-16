@extends('layouts.app')

@section('content')

@if (count($errors) >0){
    @foreach ($errors as $item)
        <h2>{{ $item }}</h2>
    @endforeach
}
    
@endif
<div class="jumbotron jumbotron-fluid bg-dark text-white">
    <div class="container">

      <h1 class="display-4">Update Posts</h1>
      <p class="lead"> <a href="{{ route('posts') }} " class="btn btn-success mb-2"> ALL POSTS</a></p>
    </div>
</div>

        
   <div class="container">
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
       

        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" class="form-control" name="title" value="{{ $post->title }}" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="file" class="form-control" name="photo" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
          @foreach ($tags as $item)
          <input type="checkbox" name="tags[]"
             value="{{$item->id}}"
             @foreach ($post->tag as $item2)
                 @if ($item->id == $item2->id)
                     checked
                 @endif
             @endforeach

             >

             <label for="">{{$item->name}}</label>
          @endforeach

        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{!! $post->content !!}</textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-primary my-3" type="submit">UPDATE</button>
        </div>
 

    </form>
   </div>










@endsection