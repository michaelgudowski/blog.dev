@extends ('layouts.master')

@section('content')
	@foreach ($posts as $post)
   	<acticle>
   	<p>{{{ $post->title }}}</p>
   	<p>{{{ $post->body }}}</p>
	<a href="{{{ action('PostsController@show', $post->id) }}}">Read more</a>
	</action>
	@endforeach

{{-- for pagination--}}
{{ $posts->links() }}


@stop