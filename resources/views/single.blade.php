@extends('layouts.app')

@section('subtitle')
{{ $posts->title }}
@endsection
@section('content')
<div class="blog-details-area pd-top-50 pd-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrap">
                    
                        <h4>{{ $posts->title }}</h4>
                        <div>
                            @if (!empty($posts->category->name))
                            <a class="tag tag-1" href="#">{{ $posts->category->name }}</a>
                            @else

                            @endif
                        </div>
                        <div class="meta">
                            <a href="#" class="author">
                                <img src="{{ asset('themes/front/img/author/3.png' )}}" alt="img">
                                {{ $posts->author }}
                            </a>
                        </div>
                        <div class="meta float-sm-right">
                            <div class="date">
                                <i class="fa fa-clock-o"></i>
                                {{ Carbon\Carbon::parse($posts->created_at)->format('d-M-Y')}}
                            </div>
                            <div class="comments m-0">
                                <i class="fa fa-comments"></i>
                                Comments 254
                            </div>
                            <div class="time">
                                <i class="fa fa-clock-o"></i>
                                5 mins Read
                            </div>
                        </div>
                        <div class="blog-details-slider owl-carousel owl-theme">
                            <div class="item">
                                <div class="top-post-wrap">
                                    <div class="thumb">
                                        <img src="{{ asset($posts->images)}}" width="800" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{!! $posts->content !!}</p>

                        <a class="ad-area" href="#">
                            <img src="{{ asset('themes/front/img/ad/2.png' )}}" alt="img">
                        </a>
                        <div class="blog-share-area">
                            <h5>Share Post</h5>
                            <ul class="social-area social-area-3">
                                <li>
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li>
                                   <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                   <a class="behance" href="#"><i class="fa fa-behance"></i></a>
                                </li>
                                <li>
                                   <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="blog-author-area">
                            <div class="blog-author-details media">
                                <img src="{{ asset('themes/front/img/author/3b.png' )}}" alt="author">
                                <div class="media-body">
                                    <h6>{{$posts->author}}</h6>
                                    <p>Living a fully ethical life, game-changer overcome injustice co-creation catalyze co-creation revolutionary white paper systems thinking hentered. Innovation resilient deep dive shared unit of analysis, ble</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent-blog-area">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Related Posts</h6>
                                </div>
                                @if (!empty($relateds))
                                @foreach($relateds as $item)
                                <div class="col-md-6">
                                    <div class="single-post-wrap">
                                        <div class="thumb">
                                            <img src="{{ asset($item->images )}}" height="200" width="350" alt="img">
                                            @if (!empty($item->category->name))
                                            <a class="tag" href="#">{{$item->category->name}}</a>
                                            @else

                                            @endif
                                        </div>
                                        <h6><a href="{{ route('main.single', $item->slug) }}">{{$item->title}}</a></h6>
                                        <div class="meta">
                                            <a href="#" class="author">
                                                <img src="{{ asset('themes/front/img/author/3.png' )}}" alt="img">
                                               {{$item->author}}
                                            </a>
                                            <div class="date">
                                                <i class="fa fa-clock-o"></i>
                                               {{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else

                                @endif
                            </div>
                        </div>
                        <div class="comment-area">
                            <h5>You May Add Comment Now.</h5>
                           comment
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="widget-tab widget-tab-2 widget">
                        <ul class="nav nav-tabs">
                            <li><a class="active" data-toggle="tab" href="#post1">Popular</a>
                            </li>
                            <li><a data-toggle="tab" href="#post2">Recent</a>
                            </li>
                            <li><a data-toggle="tab" href="#post3">Comments</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="post1" class="tab-pane fade active show">
                                @foreach($features->take(2) as $item)
                                <div class="media-post-wrap media">
                                    <div class="thumb">
                                        <img src="{{ asset($item->images )}}" height="70" width="90" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <h6><a href="{{ route('main.single', $item->slug) }}">{{$item->title}}</a></h6>
                                        <div class="meta">
                                            <div class="date">
                                                <i class="fa fa-clock-o"></i>
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}
                                            </div>
                                            <a href="#" class="author">
                                                <i class="fa fa-user"></i>
                                                Alex Nuya 
                                            </a>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                            </div>
                            <div id="post2" class="tab-pane fade">
                                <div class="media-post-wrap media">
                                    <div class="thumb">
                                        <img src="{{ asset('themes/front/img/post/4s.png' )}}" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <h6><a href="#">There must be someone behind the person who has achieved</a></h6>
                                        <div class="meta">
                                            <div class="date">
                                                <i class="fa fa-clock-o"></i>
                                                12 Jun 22
                                            </div>
                                            <a href="#" class="author">
                                                <i class="fa fa-user"></i>
                                                Alex Nuya 
                                            </a>
                                        </div>
                                    </div>
                                </div> 
                                
                            </div>
                            <div id="post3" class="tab-pane fade">
                                <div class="media-post-wrap media">
                                    <div class="thumb">
                                        <img src="{{ asset('themes/front/img/post/4s.png' )}}" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <h6><a href="#">There must be someone behind the person who has achieved</a></h6>
                                        <div class="meta">
                                            <div class="date">
                                                <i class="fa fa-clock-o"></i>
                                                12 Jun 22
                                            </div>
                                            <a href="#" class="author">
                                                <i class="fa fa-user"></i>
                                                Alex Nuya 
                                            </a>
                                        </div>
                                    </div>
                                </div> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-area">
                        <div class="widget widget-subscribe text-center">
                            <h5>Subscribe Now</h5>
                            <div class="widget-subscribe-details">
                                <div class="thumb">
                                    <img src="{{ asset('themes/front/img/icon/envelope.png' )}}" alt="img">
                                </div>
                                <h6>Subscribe Our Newslatter</h6>
                                <div class="newsletter-inner">
                                    <input type="text" placeholder="Enter Your Email address">
                                    <button><i class="fa fa-paper-plane-o"></i></button>
                                </div>
                                <p>There is only notifications about new products &amp; updates</p>
                            </div>
                        </div>
                        <div class="widget widget-social-area">
                            <h5 class="widget-title">Social Media</h5>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook-square"></i>Facebook 12k</a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i>Pinterest 32k</a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin-square"></i>Linkedin 16k</a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter-square"></i>Twitter 9k</a></li>
                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram 12k</a></li>
                                <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i>Youtube 34k</a></li>
                            </ul>
                        </div> 
                        <div class="widget widget-visitor text-center">
                            <h5>Monthly Visitor</h5>
                            <h6>77,179744</h6>
                            <p>Youn Become a part of the InSky as a member</p>
                            <a class="btn btn-main" href="#">Become a Member</a>
                        </div>
                        <div class="widget widget-list">
                            <h5 class="widget-title">Best Stories</h5>
                            <div class="media-post-wrap media">
                                <div class="thumb">
                                    <img src="{{ asset('themes/front/img/widget/1.png' )}}" alt="img">
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
                                    <img src="{{ asset('themes/front/img/widget/2.png' )}}" alt="img">
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
                                    <img src="{{ asset('themes/front/img/widget/3.png' )}}" alt="img">
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
                                    <img src="{{ asset('themes/front/img/widget/4.png' )}}" alt="img">
                                </div>
                                <h6>Travel ipsum dolor sit amet, consectetur adipiscing elit aliqua.</h6>
                            </div>
                            <div class="single-widget-post">
                                <div class="thumb">
                                    <img src="{{ asset('themes/front/img/widget/5.png' )}}" alt="img">
                                </div>
                                <h6>Travel ipsum dolor sit amet, consectetur adipiscing elit aliqua.</h6>
                            </div>
                            <a class="load-more-btn" href="#">Load More</a>
                        </div>
                        <div class="widget widget_tags">
                            <h4 class="widget-title">Popular Tags</h4>
                            <div class="tagcloud">
                                <a href="#">Facebook</a>
                                <a href="#">Life Partner</a>
                                <a href="#">Art</a>
                                <a href="#">Latest Story</a>
                                <a href="#">Kitchen Toolsa</a>
                                <a href="#">Art</a>
                                <a href="#">Science</a>
                                <a href="#">Student</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection