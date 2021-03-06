@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-10">
		<h1>All Posts</h1>
	</div>
	<div class="col-md-2">
		<!-- <a href="/posts/create" class="btn btn-md btn-block btn-primary btn-h1-spacing">Create New Post</a> -->
		<a href="{{ route('posts.create')}} " class="btn btn-md btn-block btn-primary btn-h1-spacing">Create New Post</a>
	</div>
	</div>
	<div class="row">
	<div class="col-md-12">
		<table class="table">
		<thead>
			<th>#</th>
			<th>Title</th>
			<th>Body</th>
			<th>Creayed At</th>
			<th></th>
		</thead>

		@foreach($post as $post)
		<tr>
			<td>{{$post->id}}<td>
			<td>{{$post->title}}</td>
			<td>{{substr($post->body,0,50)}}</td>
			<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
					<td>
			<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
			<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
			</td>
		</tr>
		@endforeach
		</table>
	</div>
</div>
@endsection
