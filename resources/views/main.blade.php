@extends('layouts.app')

@section('subtitle')
Home
@endsection
@section('content')
<div class="top-post-area pd-top-30 pd-bottom-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				@if (!empty($features))
				<div class="top-post-wrap">
					<div class="thumb">
						<div class="overlay"></div>
						<img src="{{ asset($features->images)}}" height="450" width="800" alt="img">
						@if (!empty($features->category->name))
						<a class="tag" href="#">{{ $features->category->name }}</a>
						@else

						@endif
					</div>
					<div class="top-post-details">
						<h3><a href="{{ route('main.single', $features->slug) }}">“{{ $features->title }}.”</a></h3>
						<div class="meta">
							<a href="#" class="author">
								<img src="{{ asset('themes/front/img/author/1.png')}}" alt="img">
								{{ $features->author }}  
							</a>
							<div class="date">
								<i class="fa fa-clock-o"></i>
								{{ Carbon\Carbon::parse($features->created_at)->format('d-M-Y')}}
							</div>
							<div class="views">
								586 Views
							</div>
						</div>
					</div>
				</div>
				@else

				@endif 
			</div>
			<div class="col-lg-4">
				<div class="row">
					@foreach($posts->take(2) as $item)
					<div class="col-lg-12 col-md-6">
						<div class="top-post-wrap">
							<div class="thumb">
								<div class="overlay"></div>
								<img src="{{ asset($item->images)}}" height="210" width="350" alt="img">
								@if (!empty($item->category->name))
								<a class="tag" href="#">{{ $item->category->name }}</a>
								@else

						        @endif
							</div>
							<div class="top-post-details-2">
								<h6><a href="{{ route('main.single', $item->slug) }}">“{{ $item->title }}.”</a></h6>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="featured-area bg-gray pd-top-30 pd-bottom-50">
	<div class="container">
		<div class="section-title">
			<div class="row">
				<div class="col-sm-6">
					<h4 class="title">Featured Posts</h4>
				</div>
				<div class="col-sm-6 text-sm-right align-self-center">
					<a class="see-all-btn float-sm-right" href="#">See All Featured</a>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($posts as $item)
			<div class="col-lg-4 col-md-6">
				<div class="single-post-wrap">
					<div class="thumb">
						<img src="{{ asset($item->images)}}" height="200" width="350" alt="img">
						@if (!empty($item->category->name))
						<a class="tag" href="#">{{ $item->category->name }}</a>
						@else

						@endif
					</div>
					<h6><a href="{{ route('main.single', $item->slug) }}">{{ $item->title }}</a></h6>
					<div class="meta">
						<a href="#" class="author">
							<img src="{{ asset('themes/front/img/author/1.png')}}" alt="img">
							{{$item->author}} 
						</a>
						<div class="date">
							<i class="fa fa-clock-o"></i>
							{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}
						</div>
						<div class="views">
							586 Views
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection