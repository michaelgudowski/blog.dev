@extends ('layouts.master')


<!-- section has to be in the body of html just as it is in master.blade.php-->
@section('content')

<div class="container">
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class ="page-header">
		<h1>Create A New Entry</h1>
	</div>
	{{Form::open(array('action' => 'PostsController@store', 'files'=> true))}}

		@include('posts.form')

	{{Form::submit('Create Post', array('class'=> 'btn btn-primary'))}}

	{{Form::close()}}
	<div class="col-md-4"></div>

</div>
	


@stop