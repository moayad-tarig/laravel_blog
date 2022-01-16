@extends('layouts.app')

@section('content')



<div class="jumbotron jumbotron-fluid bg-primary text-white">
<div class="container">
        <div class="container">
          <h1 class="display-4">Users</h1>
          <a href="{{ route('post.create') }}" class="btn btn-success mb-2">Create Post</a>
          <a href="{{ route('tags') }}" class="btn btn-success mb-2 btn btn-warning">Tags</a>
          
          <a href="{{ route('user.create') }}" class="btn btn-success mb-2 btn btn-danger">Create User</a>
        </div>
        </div>
</div>

        <!-- body -->
      <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <a href="{{ route('user.edit',['id' => $user->id]) }}" class="btn btn-primary" class="btn btn-danger">Edit</a>
                        <a href="{{ route('user.destroy',['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                    
                @endforeach
          
             
            </tbody>
          </table>
      </div>
            
            </div>
          </div>



          
      
    


@endsection