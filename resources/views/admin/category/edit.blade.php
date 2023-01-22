

@extends('admin.layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
	{{-- Breadcrumb --}}
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Category</li>
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<!-- Messages -->
			@if (Session::has('message'))
				<div class="alert alert-success">
					{{Session::get('message')}}
				</div>
			@endif

			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
				</div>
				<div class="card-body">
					<!-- Form -->
					<form 
						action="{{route('category.update', [$category->id])}}" 
						method="post" 
						enctype="multipart/form-data"
					>
						@csrf 
						@method('PUT')
						<div class="form-group">
							<label for="name">Name</label>
							<input 
								type="text" 
								name="name" 
								class="form-control @error('name') is-invalid @enderror"	
								placeholder="Enter name of category"
								value="{{$category->name}}"
							>
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea 
								name="description" 
								class="form-control @error('description') is-invalid @enderror" 
								placeholder="Description"
							>{{$category->description}}</textarea>
							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<div class="custom-file">
								<input 
									type="file" 
									name="image" 
									class="custom-file-input @error('image') is-invalid @enderror" 
									id="customFile"
								>
								<label class="custom-file-label" for="customFile">Choose file</label>
								@error('image')
									<span class="invalid-feedback" role="alert">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
	</div>
	<!--Row-->

</div>

@endsection