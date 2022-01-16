@extends('layouts.app')

@section('content')

@if (count($errors) >0){
    @foreach ($errors as $item)
        <h2>{{ $item }}</h2>
    @endforeach
}
    
@endif
<div class="jumbotron jumbotron-fluid bg-warning text-white">
    <div class="container">
      <h1 class="display-4">Create Tags</h1>
      <a href="{{ route('tags') }} " class="btn btn-dark mb-2"> ALL Tags</a>
       <a href="{{ route('posts') }} " class="btn btn-primary mb-2"> ALL Posts</a>
    </div>
</div>

        
   <div class="container">
    <form action="{{ route('tag.store') }}" method="Post" >
        @csrf

        <div class="form-group">
          <label for="exampleFormControlInput1">Add New Tags</label>
          <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
        </div>
       
  

        <div class="form-group">
            <button class="btn btn-primary my-3" type="submit">SAVE</button>
        </div>
 

    </form>
   </div>










@endsection