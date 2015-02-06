<?php

class PostsController extends BaseController {

	public function __contruct(){
		parent::__contruct();

		$this->beforeFilter('auth', array('except'=> array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Post::with('user');

		if(Input::has('search')){
			$search = Input::get('search');
			// searching in the title where something is like (defined by user)
			$query->where('title', 'like', "%$search%")->orWhere('body', 'like', "%$search%");
		}
		$posts = $query->orderBy('created_at','desc')->paginate(4);

		return View::make('posts.index')->with('posts',$posts);	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = new Post();
		// $post->user_id = Auth::id();


		return $this->savePost($post);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$post = Post::findOrFail($id);
		return View::make('posts.show')->with('post',$post);	

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post= Post::findOrFail($id);
		return View::make('posts.edit')-> with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::findOrFail($id);
		return $this->savePost($post);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try{
			$post = Post::findOrfail($id);
		} catch (ModelNotFoundException $e){
			Log::warning("User made a Bad PostController request", array(
				'id' => $id));
			App::abort(404);
		}
		$post->delete();
		Session::flash("sucessMessage", 'Post Deleted!');
		return Redirect::action('PostsController@index');
	}

	protected function savePost($post)
	{
		$validator = Validator::make(Input::all(), Post::$rules);

		if ($validator->fails())
		{

			Session::flash('errorMessage', 'Failed to save your post!');
			return Redirect::back()->withInput()->withErrors($validator);	
		} 
		else{
			Session::flash('successMessage', 'Post successfully saved!');
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->user_id = Auth::id();
			$post->save();
			return Redirect::action('PostsController@show', $post->id);
		}

		if (Input::hasFile('image')){
			$uploadPath = public_path() . '/uploads';
			$fileName = $post->id . '-' . Input::file('image')->getClientOriginalName();

			Input::file('image')->move($uploadPath, $fileName);

			$post->img_url = '/uploads/' . $fileName;

			$post->save();
		
		return Redirect::action('PostsController@show', $post->id);
		}
	}


	public function home()
	{
		return View::make('home');
	}

	
}
