<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Post;
use App\Reply;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
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
            'comment'   =>  'required|min:3|max:2000'
            ));

        $post = Post::find($request->post_id);
        $comment = new Comment();
        //$comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();

        Session::flash('success', 'Comment was added');
        return redirect()->route('posts.show', $comment->post_id);
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

        Session::flash('success', 'Comment updated');

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

        Session::flash('success', 'Deleted Comment');

        return redirect()->route('posts.show', $post_id);
    }


    public function storeReply(Request $request)
    {
        $this->validate($request, array('reply'   =>  'required|min:3|max:2000'));
        $comment = Comment::find($request->comment_id);
        $reply = new Reply();
        $reply->userid = $request->user_id;
        $reply->reply = $request->reply;
        $reply->comment()->associate($comment);
        $reply->save();

        Session::flash('success', 'Comment was added');
        return redirect()->route('posts.show', $comment->post_id);
    }
}
