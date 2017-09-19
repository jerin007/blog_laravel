<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('id', 'desc')->paginate(10);
        $posts = Post::orderBy('id', 'asc')->get();
        return View('posts.index')->withPost($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the Database
        $this -> validate($request, array(
          'title' => 'required|max:255',
          'body' => 'required'
        ));

        // store in the Database
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        Session::flash('success', 'The blog post was successfully save!');
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
      if(!$post)
      {
         return redirect('/')->withErrors('requested page not found');
      }
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
        return view('posts.edit')->withPost($post);
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
       // Validate the data
       $post = Post::find($id);
       $this->validate($request, array(
               'title' => 'required|max:255',
               'body'  => 'required'
           ));

       // Save the data to the database
       $post = Post::find($id);
       $post->title = $request->input('title');
       $post->body =  $request->input('body');
       $post->save();

       // set flash data with success message
       Session::flash('success', 'This post was successfully saved.');
       // redirect with flash data to posts.show
       return redirect()->route('posts.show', $post->id);
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
          if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
          {
            $post->delete();
            Session::flash('success', 'The post was successfully deleted.');
            return redirect()->route('posts.index');
          }
          else
          {
            $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
          }
          return redirect('/')->with($data);
    }

}
