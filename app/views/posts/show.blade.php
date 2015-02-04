@extends ('layouts.master')

@section('content')
	<p>{{$post->title}}<p>
	<p>{{$post->body}}<p>
	<p>{{{$post->created_at->setTimezone('America/Chicago')->diffForHumans()}}}</p>
	
<div>
	<h1 class="page-header"> {{{ $post->title}}}</h1>
	<p class="text-muted pull-right"> Posted {{{ $post->created_at->diffForHumans()}}}</p>
</div>

<a href="{{{ action('PostsController@edit', $post->id) }}}"> Edit Post</a>

@stop