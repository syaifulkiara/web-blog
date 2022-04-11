@extends('layouts.back')

@section('subtitle')
Category
@endsection
@section('content')
<div class="row">
		<div class="col-md-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-title mb-2">Add Category</p>
					<form action="{{route('categories.store')}}" method="POST" class="forms-sample">
						@csrf
						<div class="form-group mb-2">
							<label for="exampleInputUsername1">Name</label>
							<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name">
							@error('name')
              <span class="invalid-feedback" role="alert">
                  <strong class="text-danger">{{ $message }}</strong>
              </span>
              @enderror
						</div>
						<div class="form-group mb-2">
							<label for="exampleInputEmail1">Description</label>
							<textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-title">Category</p>
					<div class="row">
						<div class="col-12">
							<div class="table-responsive">
								<table id="myTable" class="display expandable-table" style="width:100%">
									<thead>
										<tr>
											<th>Category</th>
											<th>Slug</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($categories as $item)
										<tr>
											<td><b>{{$item->name}}</b></td>
											<td>{{$item->slug}}</td>
											<td>{{$item->description}}</td>
											<td> 
												<form action="{{route('categories.destroy',$item->id)}}" method="POST">
			                    @csrf
			                    @method('DELETE')
			                    <a href="{{route('categories.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
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
    $('#myTable').DataTable();
} );
</script>
@endpush
