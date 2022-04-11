<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;
use Str;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|min:10|max:200'
        ]);

        $posts              = new Post;
        $posts->category_id = $request->category_id;
        $posts->title       = $request->title;
        $posts->slug        = time().'-'.Str::slug($posts->title);
        $posts->author      = Auth::user()->name;
        $posts->content     = $request->content;
        if($request->file('images')) {
             $file          = $request->file('images');
             $filename      = str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/posts', $filename);
             $posts->images   = 'images/posts/'.$filename;
         }
        $posts->save();
        
        return redirect()->route('posts.index')->with('success','Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('posts','categories'));
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
        $request->validate([
            'title' => 'required|min:10|max:200'
        ]);

        $posts              = Post::find($id);
        $posts->category_id = $request->category_id;
        $posts->title       = $request->title;
        $posts->content     = $request->content;
        if($request->file('images')) {
             $file          = $request->file('images');
             $filename      = str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/posts', $filename);
             
             File::delete(public_path($posts->images));
             $posts->images   = 'images/posts/'.$filename;
         }
        $posts->save();
        
        return redirect()->route('posts.index')->with('success','Item edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->back()->with('success','Item delete successfully!');
    }
}
