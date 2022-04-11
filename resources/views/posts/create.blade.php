@extends('layouts.back')

@section('subtitle')
Post
@endsection
@section('content')
<div class="row">	
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div class="card-title"> New Post
                    <div class="float-right"><a href="{{route('posts.index')}}">
                    	<i class=" mdi mdi-backspace" title="Back"></i></a></div>
                </div>
				<form action="{{route('posts.store')}}" method="POST" class="form-sample" enctype="multipart/form-data">
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
									<textarea class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" name="content"  id="tinyMceExample" rows="4"></textarea>
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
									<img id="preview-image-before-upload" width="227" src="{{asset('themes/back/images/prew.png')}}">
								</a>
								<div class="form-group mt-2">
									<div class="">
										<label class="">Category</label>
										<select class="form-control form-control-sm" name="category_id">
					                      <option value="">--Pilih Category--</option>
					                      @foreach($categories as $item)
					                      <option value="{{$item->id}}">{{$item->name}}</option>
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
<script src="{{asset('themes/back/vendors/tinymce/tinymce.min.js')}}"></script>
<script>
var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
tinymce.init({
  selector: 'textarea#tinyMceExample',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  contextmenu: 'link image imagetools table',
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
 });
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