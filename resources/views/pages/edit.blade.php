@extends('layouts.back')

@section('subtitle')
Add Pages
@endsection
@section('content')
<div class="row">	
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="card-title"> New Page
                    <div class="float-right"><a href="{{route('pages.index')}}">
                    	<i class=" mdi mdi-backspace" title="Back"></i></a></div>
                </div>
				<form action="{{route('pages.update', $pages->id)}}" method="POST" class="form-sample" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-md-9">
							<div class="form-group row">
								<div class="col">
									<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $pages->title }}" placeholder="Title" />
									@error('title')
						              <span class="invalid-feedback" role="alert">
						                  <strong class="text-danger">{{ $message }}</strong>
						              </span>
						            @enderror
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<textarea class="form-control @error('content') is-invalid @enderror" name="content" id="editor1" rows="4">{{ $pages->content }}</textarea>
									@error('content')
						              <span class="invalid-feedback" role="alert">
						                  <strong class="text-danger">{{ $message }}</strong>
						              </span>
						            @enderror
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm"> Save</button>
								<button class="btn btn-warning btn-sm"> Draft</button>
								<a href="{{route('pages.index')}}" class="btn btn-danger btn-sm"> Cancel</a>
							</div>
							<div class="form-group">
								<div class="mb-2">
									<label class="">Images</label>
									<input type="file" name="images" id="image" class="form-control" />
								</div>
								<a href="#" class="thumbnail">
									<img id="preview-image-before-upload" width="227" src="{{asset($pages->images)}}">
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script src="{{asset('themes/back/vendors/ckeditor/ckeditor.js')}}"></script>
<script>
	$(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1')
//bootstrap WYSIHTML5 - text editor
$('.textarea1').wysihtml5()
})
</script>
<script src="{{asset('themes/back/js/jquery-3.5.1.min.js')}}"></script> 
<script>      
	$(document).ready(function (e) {  
		$('#image').change(function(){           
			let reader = new FileReader();
			reader.onload = (e) => { 
				$('#preview-image-before-upload').attr('src', e.target.result); 
			}
			reader.readAsDataURL(this.files[0]);   
		});  
	});
</script>
@endpush