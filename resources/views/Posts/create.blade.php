@extends('layouts.app')

@section('content')

@if (count($errors) >0){
    @foreach ($errors as $item)
        <h2>{{ $item }}</h2>
    @endforeach
}
    
@endif
<div class="jumbotron jumbotron-fluid bg-primary text-white">
    <div class="container">
      <h1 class="display-4">Create Posts</h1>
      <p class="lead"> <a href="{{ route('posts') }} " class="btn btn-success mb-2"> ALL POSTS</a></p>
    </div>
</div>

        
   <div class="container">
    <form action="{{ route('post.store') }}" method="Post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
        </div>
        @foreach ($tag as $item)
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault" name="tags[]" >
          <label class="form-check-label" for="flexCheckDefault">
            {{ $item->name }}
          </label>
        </div>
        @endforeach
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="file" class="form-control" name="photo" id="exampleFormControlInput1" >
        </div>
      
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-primary my-3" type="submit">SAVE</button>
        </div>
 

    </form>
   </div>










@endsection