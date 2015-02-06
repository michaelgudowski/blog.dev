@extends ('layouts.master')

@section('content')

	@foreach ($posts as $post)
	   	<article>
		   	<p>{{{ $post->title }}}</p>
		   	<p>{{{ $post->body }}}</p>
			<h5>by: {{{$post->user->email}}}</h5>
			<a href="{{{ action('PostsController@show', $post->id) }}}">Read more</a>
		</article>
	@endforeach

{{-- for pagination--}}
{{ $posts->links() }}


@stop