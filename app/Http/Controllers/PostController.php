<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        // https://stackoverflow.com/a/56927928/460885
        // the below is the same as return view('post.index', compact('posts'));
        // https://www.php.net/manual/en/function.compact.php
        return view('post.index')->withPosts($posts);
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title'         => 'required|min:3|max:255',
        'slug' => 'required|min:3|max:255|unique:posts',
        'body'          => 'required|min:3'
      ]);

      $post = new Post;

      $post->title = $request->title;
      $post->slug = Str::slug($request->slug);
      $post->body = $request->body;

      $post->save();

      return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
    $post = Post::where('slug', $slug)->first();

    return view('post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $post = Post::findOrFail($id);
      
            return view('post.edit')->withPost($post);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|min:3|max:255|unique:posts,id,' . $slug,
            'body'          => 'required|min:3'
          ]);
          
          // find me all posts which have provided slug.
          //->first() Tells framework LIMIT 1.
          $post = Post::where('slug', $slug)->first();
    
          $post->title = $request->title;
          $post->slug = Str::slug($request->slug);
          $post->body = $request->body;
    
          $post->save();
    
          return redirect()->route('post.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
