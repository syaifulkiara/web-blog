@extends('layouts.app')

@section('subtitle')
Category
@endsection
@section('content')
<div class="blog-category-area pd-top-50 pd-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <i class="fa fa-home"></i>
                        <ul class="page-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-title pt-0">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="title">Popular Categories</h5>
                    </div>
                    <div class="col-sm-6 text-sm-right align-self-center">
                        <h5><a href="#">({{ $allcategory->count() }})</a></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($category as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="single-category-wrap">
                        <div class="thumb">
                            <img src="{{ asset('themes/front/img/category/7.png') }}" alt="img">
                            <a href="{{route('main.categorypost',$item->slug)}}"><img src="{{ asset('themes/front/img/fire.png') }}" alt="img">{{ $item->name }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $category->links() }}
        </div>
    </div> 
    <!-- blog-category area End -->

    <div class="blog-category-area bg-gray pd-top-70 pd-bottom-80">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="title">Most Liked Categories</h5>
                    </div>
                    <div class="col-sm-6 text-sm-right align-self-center">
                        <h5><a href="#">({{$most->count()}})</a></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($most as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="{{ asset($item->images) }}" alt="img">
                            @if (!empty($item->category->name))
                            <a class="tag" href="#">{{ $item->category->name }}</a>
                            @else

                            @endif
                        </div>
                        <h6><a href="{{ route('main.single', $item->slug)}}">{{$item->title}}</a></h6>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="btn-wrap text-center">
                        <a class="btn btn-main" href="#">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection