@extends('layouts.back')

@section('subtitle')
Edit Post
@endsection
@section('content')
<div class="row">	
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<div class="card-title"> Edit Post
	                    <div class="float-right"><a href="{{route('posts.index')}}">
	                    	<i class=" mdi mdi-backspace" title="Back"></i></a></div>
	                </div>
					<form action="{{route('posts.update', $posts->id)}}" method="POST" class="form-sample" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-9">
								<div class="form-group row">
									<div class="col">
										<input type="text" name="title" class="form-control" value="{{ $posts->title }}" placeholder="Title" />
										@error('title')
							              <span class="invalid-feedback" role="alert">
							                  <strong class="text-danger">{{ $message }}</strong>
							              </span>
							            @enderror
									</div>
								</div>
								<div class="form-group row">
									<div class="col">
										<textarea class="form-control" name="content" id="editor1" rows="4">{{ $posts->content }}</textarea>
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
									<a href="{{route('posts.index')}}" class="btn btn-danger btn-sm"> Cancel</a>
								</div>
								<div class="form-group">
									<div class="mb-2">
										<label class="">Images</label>
										<input type="file" name="images" id="image" class="form-control" />
									</div>
									<a href="#" class="thumbnail">
										<img id="preview-image-before-upload" width="227" src="{{asset( $posts->images )}}">
									</a>
									<div class="form-group">
										<div class="">
											<label class="">Category</label>
											<select class="form-control form-control-sm" name="category_id">
						                      <option value="{{ $posts->category_id }}">--Pilih Category--</option>
						                      @foreach($categories as $item)
						                      <option value="{{ $item->id }}" {{ old('category_id', $posts->category_id) == $item->id ? 'selected' : '' }}>{{ ucfirst($item->name) }}</option>
						                      @endforeach
						                    </select>
										</div>
									</div>
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