@extends('layouts.app')

@section('content')

  <center>
    <!-- <h1>Create New Post</h1><hr>
    <div class="row">
      <form class="" action="index.html" method="post">
        <div class="form-gorup">
          <label name="email">Title:</label>
          <input type="text" id="email" name="email" class="form-control">
        </div>

        <div class="form-gorup">
          <label name="subject">Subject:</label>
          <input type="text" id="subject" name="subject" class="form-control">
        </div>

        <div class="form-gorup">
          <label name="message">Message:</label>
          <textarea id="message" name="message" class="form-control">Type your comment here...</textarea>
        </div>
        <br/>
        <input type="submit"  value="Send Message" class="btn btn-success">

      </form>
    </div> -->
  </center>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>
      {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

        {{Form::label('body','Post Body')}}
        {{Form::textarea('body',null,array('class' => 'form-control'))}}

        {{Form::submit('Create Post',array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top:20px'))}}
      {!! Form::close() !!}

    </div>

  </div>

@endsection
