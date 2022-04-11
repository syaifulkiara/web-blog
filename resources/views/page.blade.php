@extends('layouts.app')

@section('subtitle')
{{ $page->title }}
@endsection
@section('content')
<div class="contact-area pd-top-50 pd-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-area-wrap">
                    <div class="row">
                        <div class="col-lg-9">
                            <h4>{{ $page->title }}</h4>
                            <hr>
                            <p>{!! $page->content !!}</p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{ asset($page->images) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection