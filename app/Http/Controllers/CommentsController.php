<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use Session;

class CommentsController extends Controller
{

    public function __construct() {
      $this->middleware('auth', ['except' => 'store']);
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment = Comment::find($id);

      return view('comments.edit')->withComment($comment);
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
      $comment = Comment::find($id);

      $this->validate($request, array('comment' => 'required'));

      $comment->comment = $request->comment;
      $comment->save();

      Session::flash('success', 'Comment Updated');
      return redirect()->route('posts.show', $comment->post->id);

    }

    public function delete($id)
    {
      $comment = Comment::find($id);

      return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comment = Comment::find($id);
      $post_id = $comment->post->id;
      $comment->delete();

      Session::flash('success', 'Comment Deleted');
      return redirect()->route('posts.show', $post_id);
    }
}
