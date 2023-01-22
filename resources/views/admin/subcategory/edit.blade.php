@extends('admin.layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">

	<!-- Breadcrumb -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/subcategory">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Subcategory</li>
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<!-- Session alert messages -->
			@if (Session::has('message'))
				<div class="alert alert-success">
					{{Session::get('message')}}
				</div>
			@endif

			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Edit Subcategory</h6>
				</div>
				<div class="card-body">

					<!-- Form -->
					<form 
						action="{{route('subcategory.update', [$subcategory->id])}}" 
						method="post" 
					>
						@csrf 
						@method('PUT')
						<div class="form-group">
							<label for="name">Number of Bedrooms</label>
							<input 
								type="text" 
								name="num_bedrooms" 
								class="form-control @error('num_bedrooms') is-invalid @enderror"	
								placeholder="Enter number of bedrooms"
								value="{{$subcategory->num_bedrooms}}"
							>
							@error('num_bedrooms')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="description">Choose Category</label>
							<select name="category" class="form-control @error('category') is-invalid @enderror">
								<option value="">Select</option>
								@foreach (App\Models\Category::all() as $category)
									<option 
										value="{{$category->id}}" 
										@if ($category->id == $subcategory->category_id)
											selected
										@endif
									>
										{{$category->name}}
									</option>
								@endforeach
							</select>

							@error('category')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
	</div>
	<!--Row-->

</div>

@endsection