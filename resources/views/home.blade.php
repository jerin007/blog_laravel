@extends('layouts.app')

@section('content')

<!-- <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div> -->


<div class="row">
  <div class="col-md-12">
    <div class="jumbotron">
      <h1>Welcome to My Blog!</h1>
      <p class="lead">Thank you so much for visiting.This is my test blog website built with Laravel. Please check my popular post.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    @foreach ($posts as $post)
    <div class="post">
      <h3>{{$post->title}}.</h2>
      <p>{{$post->body}}.</p>
      <a href="{{url('/posts',$post->id)}}" class="btn btn-primary">Read More</a>
    </div>
    <hr>
    @endforeach
  </div>

  <div class="col-md-3 col-md-offset-1">
    <div class="col-md-12" style="background-color:#eee;border-radius: 6px;padding-left: 20px;padding-right: 20px;">
      <h2>About me</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
</div>

@endsection
