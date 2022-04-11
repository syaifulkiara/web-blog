@extends('layouts.app')

@section('subtitle')
{{ $categorypost->name }}
@endsection
@section('content')
<div class="blog-list-area pd-top-50 pd-bottom-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">                  
                <div class="recent-news-area-3">
                    <div class="section-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="title mb-0">{{ $categorypost->name }}</h5>
                            </div>
                            <div class="col-sm-6 text-sm-right align-self-center">
                                <h6><a href="#">({{ $posts->count() }})</a></h6>                                    
                            </div>
                        </div>
                    </div>
                    @forelse($posts as $item)
                    <div class="media-post-wrap-2 media shadow-none">
                        <div class="thumb">
                            <img src="{{ asset($item->images)}}" width="300" height="200" alt="img">
                        </div>
                        <div class="media-body">
                            <h6><a href="{{ route('main.single', $item->slug) }}">{{ $item->title }}</a></h6>
                            <div class="meta">
                                <div class="date">
                                    <i class="fa fa-clock-o"></i>
                                    12 Jun 22
                                </div>
                                <a href="#" class="author">
                                    <i class="fa fa-user"></i>
                                    {{ $item->author }}   
                                </a>
                                <div class="views">
                                    Length: 9 Mins   
                                </div>
                            </div>
                            <p>{!! Str::limit($item->content,120) !!}</p>
                        </div>
                    </div> 
                    @empty
                    <div class="media-post-wrap-2 media shadow-none">
                        No Post in Category
                    </div> 
                    @endforelse
                </div>
                {{ $posts->links() }}
            </div>
            <div class="col-lg-4">
                <div class="sidebar-area">
                    <div class="widget widget-list">
                        <h5 class="widget-title">Best Stories</h5>
                        <div class="media-post-wrap media">
                            <div class="thumb">
                                <img src="{{ asset('themes/front/img/widget/1.png')}}" alt="img">
                            </div>
                            <div class="media-body">
                                <h6><a href="#">What was the first travel experience of my life like?</a></h6>
                                <div class="meta">
                                    <a href="#" class="author">
                                        By: Malika   
                                    </a>
                                    <div class="date">
                                        <i class="fa fa-clock-o"></i>
                                        19 Jun 22
                                    </div>
                                    <div class="views">
                                        63 Views
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="media-post-wrap media">
                            <div class="thumb">
                                <img src="{{ asset('themes/front/img/widget/2.png')}}" alt="img">
                            </div>
                            <div class="media-body">
                                <h6><a href="#">The story of becoming a good successful freelancer from.</a></h6>
                                <div class="meta">
                                    <a href="#" class="author">
                                        By: Malika   
                                    </a>
                                    <div class="date">
                                        <i class="fa fa-clock-o"></i>
                                        16 Jun 22
                                    </div>
                                    <div class="views">
                                        13 Views
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="media-post-wrap media">
                            <div class="thumb">
                                <img src="{{ asset('themes/front/img/widget/3.png')}}" alt="img">
                            </div>
                            <div class="media-body">
                                <h6><a href="#">Why a person has to go through a very difficult time in life</a></h6>
                                <div class="meta">
                                    <a href="#" class="author">
                                        By: Malika   
                                    </a>
                                    <div class="date">
                                        <i class="fa fa-clock-o"></i>
                                        12 Jun 22
                                    </div>
                                    <div class="views">
                                        92 Views
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="load-more-btn" href="#">Load More</a>
                    </div>
                    <div class="widget widget-post">
                        <h5 class="widget-title">Top Travel Posts</h5>
                        <div class="single-widget-post">
                            <div class="thumb">
                                <img src="{{ asset('themes/front/img/widget/4.png')}}" alt="img">
                            </div>
                            <h6>Travel ipsum dolor sit amet, consectetur adipiscing elit aliqua.</h6>
                        </div>
                        <a class="load-more-btn" href="#">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection