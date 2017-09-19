@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h1>Contact Me</h1>
    <hr>

    <form class="" action="index.html" method="post">
      <div class="form-gorup">
        <label name="email">Email:</label>
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
  </div>
</div>
@endsection
