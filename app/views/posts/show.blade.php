@extends ('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h2>{{$post->title}}</h2>
			<p>{{$post->body}}</p>
			<h5>by: {{{$post->user->email}}}</h5>
			<p class="text-muted pull-right"> Posted {{{ $post->created_at->diffForHumans()}}}</p>
		</div>
		<div class="col-md-6">
			@if (Auth::check())
			


			<a href="{{{ action('PostsController@edit', $post->id) }}}" class='btn btn-success'>Edit</a>
			
			{{Form::open(array('action'=>array('PostsController@destroy', $post->id), 'method' => 'delete'))}}
			{{Form::submit('Delete Post', array('class' => 'btn btn-danger'))}}
			{{Form::close()}}
		</div>
	</div>
@endif
@stop