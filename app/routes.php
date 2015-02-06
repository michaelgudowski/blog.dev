<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get(resume, 'HomeController@resume');

Route::get('/', function()
{
	return Redirect::action('PostsController@index');
});

Route::get('rolldice/{guess}', function($guess){
	
	$min=1;
  	$max=6;
  $randomnumber = rand($min,$max);
  return View::make('roll-dice')->with('randomnumber', $randomnumber)->with('guess', $guess);
});

Route::get('portfolio', 'HomeController@portfolio');

Route::get('resume', 'HomeController@resume');

//creates 7 routes from http://app.codeup.com/laravel/quickstart/resource-controllers.html table on page
Route::resource('posts', 'PostsController');

//test route on blog.dev/orm-test
Route::get('orm-test', function ()
{
$post1 = new Post();
//Gets the users input for title
$post1->title = Input::get('title');
//Hard coded into the database. Would need to use input
$post1->body  = 'It is super easy to create a new post.';
$post1->save();

$post2 = new Post();
$post2->title = 'Post number two';
$post2->body  = 'The body for post number two.';
$post2->save();
});

// Route::get('/login', function() {
// 	return View::make('login');
// });

Route::get('login', 'HomeController@showLogin');
Route::post('login', "HomeController@doLogin");
Route::get('logout', 'HomeController@doLogout');






