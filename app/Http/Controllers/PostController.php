<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->simplePaginate(10);
      return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $tags = Tag::all();
      return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, array(
        'title'       => 'required|max:255',
        'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'category_id' => 'required|integer',
        'body'        => 'required',
        'featured_image' => 'sometimes|image'
      ));

      $post = new Post;
      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = Purifier::clean($request->body);


      if ($request->hasFile('featured_image')) {
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $post->image = $filename;
      }

      $post->save();

      // Second parameter 'false' means 'Do not override existing associations'.
      // If it's true, past associations will be deleted.
      $post->tags()->sync($request->tags, false);

      Session::flash('success', 'Successfully saved!');
      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);

      return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      $categories = Category::all();
      $tags = Tag::all();

      $cats = array();
      foreach ($categories as $category) {
        $cats[$category->id] = $category->name;
      }
      $post_tags = array();
      foreach ($tags as $tag) {
        $post_tags[$tag->id] = $tag->name;
      }

      return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($post_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);

      $this->validate($request, array(
        'title' => 'required|max:255',
        'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
        'category_id' => 'required|integer',
        'body' => 'required',
        'featured_image' => 'image'
      ));

      $post->title = $request->input('title');
      $post->slug = $request->input('slug');
      $post->category_id = $request->input('category_id');
      // The '->input' isn't necessary. See 'store'.
      $post->body = Purifier::clean($request->input('body'));

      if ($request->hasFile('featured_image')) {
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);
        $oldFileName = $post->image;
        // Update the DB
        $post->image = $filename;
        // Delete the old image
        Storage::delete($oldFileName);
      }

      $post->save();

      // Second parameter 'false' means 'Do not override existing associations'.
      // Since we're editing, we want it to be true.
      if(isset($request->tags)) {
        $post->tags()->sync($request->tags, true);
      } else {
        $post->tags()->sync(array());
      }


      Session::flash('success', 'This post was successfully saved.');
      return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->tags()->detach();
      $post->delete();

      Session::flash('success', 'This post was successfully deleted.');

      return redirect()->route('posts.index');
    }
}
