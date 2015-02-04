 <div class ="form-group {{{ $errors->has('title') ? 'has-error' : ''}}}">

 {{ Form::label('title', 'Post Title')}}
 {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
 	{{$errors->first('title', '<p class="help-block">:message</p>')}}
 </div>

 <div class="form-group{{{$errors->has('body') ? 'has-errors' : ''}}}">
 	 {{Form::text('content', Input::old('content'), array('class' => 'form-control', 'rows'=> '4'))}}
 	  	{{$errors->first('content', '<p class="help-block">:message</p>')}}
</div>