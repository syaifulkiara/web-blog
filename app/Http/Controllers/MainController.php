<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use Auth;
class MainController extends Controller
{
    public function index()
    {
        $features   = Post::inRandomOrder()->first();
        $posts      = Post::orderBy('created_at','DESC')->paginate(8);
        $categories = Category::orderBy('created_at','DESC')->get();
        $pages      = Page::all();
        return view('main', compact('posts','categories','pages','features'));
    }

    public function single($slug)
    {
        $features   = Post::inRandomOrder()->get();
        $posts      = Post::where('slug','=', $slug)->first();
        $categories = Category::orderBy('created_at','DESC')->get();
        $pages      = Page::all();

        if($relateds ='')
        {

        $relateds   = Post::where('category_id', '=', $posts->category->id)
            ->where('id', '!=', $posts->id)
            ->get();
        }else{

        }

        return view('single', compact('features','posts','categories','pages','relateds'));
    }

    public function pages($slug)
    {
        $page       = Page::where('slug','=', $slug)->first();
        //$page       = Page::find($slug);
        $categories = Category::orderBy('created_at','DESC')->get();
        $pages      = Page::all();
        return view('page', compact('page','categories','pages'));
    }

    public function category()
    {
        $allcategory    = Category::all();
        $categories     = Category::orderBy('created_at','DESC')->get();
        $category       = Category::orderBy('created_at','DESC')->paginate(12);
        $most           = Post::with('category')->inRandomOrder()->get();
        $pages          = Page::all();
        return view('category', compact('categories','pages','most','allcategory','category'));
    }

    public function categorypost($slug)
    {
        $categories     = Category::orderBy('created_at','DESC')->get();
        $pages          = Page::all();
        $categorypost   = Category::where('slug', $slug)->first();
        if($categorypost)
        {
            $posts      = Post::where('category_id',$categorypost->id)->orderBy('created_at','DESC')->paginate(5);
            return view('categorypost', compact('posts','categories','pages','categorypost'));
        }else{    
        return redirect('/');
        }
    }
}
