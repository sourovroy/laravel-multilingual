<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('language_code', '=', app()->getLocale())->get();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:2'
        ]);

        $post = Post::create($request->all());

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $getLocale = app()->getLocale();
        $addLangPost = false;
        
        if($post->language_code != $getLocale){
            $addLangPost = true;

            if($post->source_language_id){
                $langPost = Post::select('id', 'language_code')->where('language_code', '=', $getLocale)->where('id', '=', $post->source_language_id)->first();
            }else{
                $langPost = Post::select('id', 'language_code')->where('language_code', '=', $getLocale)->where('source_language_id', '=', $post->id)->first();
            }
            
            if($langPost){
                $psUrl = route('posts.show', ['post' => $langPost]);
                $toUrl = LaravelLocalization::localizeURL($psUrl, $langPost->language_code);
                return redirect($toUrl);
            }
        }

        return view('show', compact('post', 'addLangPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $addLangPost = false;
        if($post->language_code != app()->getLocale()){
            $addLangPost = true;
        }

        return view('edit', compact('post', 'addLangPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:2'
        ]);

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->language_code = $request->get('language_code');

        if($request->has('source_language_id')){
            $post = Post::create($request->all());
        }else{
            $post->save();
        }

        $enUrl = route('posts.show', ['post' => $post]);
        $toUrl = LaravelLocalization::localizeURL($enUrl, $post->language_code);

        return redirect($toUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
