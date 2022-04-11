@extends('layouts.back')

@section('subtitle')
Post
@endsection
@section('content')
<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="card-title"> Post
	                    <div class="float-right"><a href="{{route('posts.create')}}">
	                    	<i class="mdi mdi-library-plus" title="Add Post"></i></a></div>
	                </div>
					<div class="row">
						<div class="col-12">
							<div class="table-responsive">
								<table id="post" class="display expandable-table" style="width:100%">
									<thead>
										<tr>
											<th>Title</th>
											<th>Author</th>
											<th>Category</th>
											<th>Comment</th>
											<th>Created</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($posts as $item)
						                <tr class="text-primary">
						                <td><a href="{{route('posts.show', $item->id)}}">{{$item->title}}</a></td>
						                <td>{{$item->author}}</td>
						                @if (!empty($item->category->name))
						                <td>{{$item->category->name}}</td>
						                @else
						                <td class="text-danger"><i>no_category</i></td>
						                @endif
						                <td></td>
						                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</td>
						                <td>
						                  <form action="{{route('posts.destroy',$item->id)}}" method="POST">
						                    @csrf
						                    @method('DELETE')
						                    <a href="{{route('posts.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
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
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('themes/back/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('themes/back/vendors/ti-icons/css/themify-icons.css')}}">
<link rel="stylesheet" type="{{asset('themes/back/text/css" href="js/select.dataTables.min.css')}}">
@endpush
@push('scripts')
<script src="{{asset('themes/back/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('themes/back/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('themes/back/js/dataTables.select.min.js')}}"></script>
<script>
	$(document).ready( function () {
    $('#post').DataTable();
} );
</script>
@endpush