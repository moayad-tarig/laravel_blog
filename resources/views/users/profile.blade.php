@extends('layouts.app')

@section('content')

@php
    $genderArray = ['Male', 'Female'];

    
@endphp

<div class="container">
    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger" role="alert">
        {{$item}} jj
      </div>
    @endforeach

    @endif
    <h2>
        Update Your Profile Info .

    </h2>
    <form action="{{ route("profile.update") }}" method="POST">
        @csrf
        @method('PUT')



        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" class="form-control"  value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">City</label>
          <input type="text" name="city" class="form-control"  value="{{ old($user->profile->city) }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Example select</label>
          <select class="form-control" name="gender" id="exampleFormControlSelect1">
        
        
            @foreach ($genderArray as $item)
            <option value="{{ $item }}" {{ ($user->profile->gender == $item) ? 'selected':"" }}>
                {{ $item }}
            </option>
            @endforeach
         
          </select>
        </div>
     
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="bio" rows="3">
              {!! $user->profile->bio !!}
          </textarea>
        </div>
        <button class="btn btn-success mt-2" type="submit">UPDATE</button>
      </form>
</div>

@endsection