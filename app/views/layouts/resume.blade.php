@extends ('layouts.master')

@section('blog')
    <h1>Hello! Welcome to my resume! </h1>


<a href="{{{ action('HomeController@portfolio') }}}">Click here to see my portfolio!</a>

@stop
