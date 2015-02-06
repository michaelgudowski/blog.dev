 <div class ="form-group {{{ $errors->has('title') ? 'has-error' : ''}}}">

 {{ Form::label('title', 'Title:')}}
 {{ Form::text('title', Input::old('title') , array('class' => 'form-control' )) }}
 	{{$errors->first('title', '<p class="help-block">:message</p>')}}
 </div>

 <div class="form-group{{{$errors->has('body') ? 'has-errors' : ''}}}">
 	 {{Form::label('body', 'content:')}}
 	 {{Form::text('body', Input::old('body') , array('class' => 'form-control', 'rows'=> '4'))}}
 	  	{{$errors->first('body', '<p class="help-block">:message</p>')}}
</div>



 <div class="form-group{{{$errors->has('image') ? 'has-errors' : ''}}}">
 	 {{Form::label('image', 'Post Image')}}
 	 {{Form::file('image', array('class' => 'form-control', 'rows'=> '4'))}}
 	  	{{$errors->first('image', '<p class="help-block">:message</p>')}}
</div>

@unless (empty($post->img_url))
	<img src="{{{$post-> img_url}}}" alt="{{{$post-title}}}">

@endunless