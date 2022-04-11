<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Page;
use App\Models\Category;
use Str;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at','DESC')->get();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'title' => 'required|unique:pages|min:5|max:200'
        ]);

        $pages              = new Page;
        $pages->title       = $request->title;
        $pages->slug        = Str::slug($pages->title);
        $pages->content     = $request->content;
        if($request->file('images')) {
             $file          = $request->file('images');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/pages', $filename);
             $pages->images   = 'images/pages/'.$filename;
         }
        $pages->save();
        
        return redirect()->route('pages.index')->with('success','Item created successfully!');
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
        $pages = Page::find($id);
        return view('pages.edit', compact('pages'));
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
            'title' => 'required|min:5|max:200'
        ]);

        $pages              = Page::find($id);
        $pages->title       = $request->title;
        $pages->content     = $request->content;
        if($request->file('images')) {
             $file          = $request->file('images');
             $filename      = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/pages', $filename);

             File::delete(public_path($pages->images));
             $pages->images   = 'images/pages/'.$filename;
         }
        $pages->save();
        
        return redirect()->route('pages.index')->with('success','Item edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Page::find($id);
        $pages->delete();

        return redirect()->back()->with('success','Item delete successfully!');
    }
}
