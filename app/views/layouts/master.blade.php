<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Blog</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	@yield('header')
	<!-- Optional theme -->
    <link rel='stylesheet' href="/css/styles.css">
</head>
<body>
    
    <!-- Navigation -->
    <nav class="navbar-responsive-collapse navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Michael Gudowski</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/index">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Contact</a>
                    </li>
                    <li>
                        <a href="/posts">View Blog</a>
                    </li>
                    @if(Auth::check())
                    <li>
                        <a href="/posts/create">Create New Post</a>
                    </li>             
                    @endif
                    <li> <div class="form-group">
                        {{Form::open(array('action' => array('PostsController@index'), 'method' => 'GET'))}}
                        {{Form::text('search', '', array('placeholder' => 'Search Posts', 'class' => "form-control"))}}
                     </div>
                     </li>
                   <li> <button type="submit" class="btn btn-default">Submit</button>
                   </li>
                {{Form::close()}}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



	@if (Session::has('successMessage'))
    	<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	@if (Session::has('errorMessage'))
    	<div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
    <div class="container"> 
        @yield('content')
    </div>
</body>
</html>