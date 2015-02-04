@extends ('layouts.master')

@section('portfolio')
    <h1>Hello! Welcome to my portfolio! </h1>
    <a href="{{{ action('HomeController@resume') }}}">Click here to see my resume!</a>

@stop