@extends('layouts.back')

@section('subtitle')
Page
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="card-title"> Pages
					<div class="float-right" type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
						<i class="mdi mdi-library-plus" title="Add Page"></i>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="pages" class="display expandable-table" style="width:100%">
								<thead>
									<tr>
										<th>Title</th>
										<th>Content</th>
										<th>Images</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($pages as $item)
									<tr class="text-primary">
										<td><h4>{{$item->title}}</h4></td>
										<td>{!! Str::limit($item->content, 100) !!}</td>
										<td><img src="{{asset($item->images)}}" width="100"></td>
										<td>
											<form action="{{route('pages.destroy',$item->id)}}" method="POST">
												@csrf
												@method('DELETE')
												<a href="{{route('pages.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
												<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')">Delete</button>
											</form> 
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-body">
				<form action="{{route('pages.store')}}" method="POST" class="form-sample" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-9">
							<div class="form-group row">
								<div class="col">
									<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Title" />
									@error('title')
									<span class="invalid-feedback" role="alert">
										<strong class="text-danger">{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<textarea class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" name="content" id="editor1" rows="4"></textarea>
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
								<button type="submit" class="btn btn-success btn-sm"> Publish</button>
								<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"> Cancel</button>
							</div>
							<div class="form-group">
								<div class="mb-2">
									<label class="">Images</label>
									<input type="file" name="images" id="image" class="form-control" />
								</div>
								<a href="#" class="thumbnail">
									<img id="preview-image-before-upload" width="227" src="{{asset('themes/back/images/prew.png')}}">
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
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="{{asset('themes/back/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('themes/back/vendors/ti-icons/css/themify-icons.css')}}">
<link rel="stylesheet" type="{{asset('themes/back/text/css" href="js/select.dataTables.min.css')}}">
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
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
<script src="{{asset('themes/back/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('themes/back/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('themes/back/js/dataTables.select.min.js')}}"></script>
<script>
	$(document).ready( function () {
		$('#pages').DataTable();
	} );
</script>
@endpush