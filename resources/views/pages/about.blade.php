@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="content">
        <div class="title m-b-md">
            About {{$data['fullname']}}
        </div>
        <p>Email me {{$data['email']}}</p>
    </div>
  </div>
</div>
@endsection
