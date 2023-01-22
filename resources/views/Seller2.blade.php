@extends('layouts.app')


@section('content')

<div class="container-fluid text-dark justify-content-center" id="container-wrapper">

	<!-- Breadcrumb -->	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="mt-3 h3 mb-0 text-success">Property</h1>
		<ol class="breadcrumb ">
			{{-- <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Category</li> --}}
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-6">
			
			<!-- Session messages -->
			@if (Session::has('message'))
				<div class="alert alert-success">
					{{Session::get('message')}}
				</div>
			@endif

			<div class="card mb-4" style="border-color:rgb(36,156,76);">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-success">Create Property</h6>
				</div>
				<div class="card-body  text-success">

					<!-- Form -->					
					<form action="{{route('property.store')}}" method="post" enctype="multipart/form-data">
						@csrf 

						<div class="form-group">
							<label for="price">Price</label>
							<input 
								type="number" 
								name="price" 
								class="form-control @error('price') is-invalid @enderror  "	
								placeholder="Enter price of property"
                                
							>
							@error('price')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input 
								type="text" 
								name="address" 
								class="form-control @error('address') is-invalid @enderror  "	
								placeholder="Enter address of property"
							>
							@error('address')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="name">Bedrooms</label>
							<input type="number" name="bedrooms" class="form-control @error('bedrooms') is-invalid @enderror  "	placeholder="Enter number of bedrooms">
							@error('bedrooms')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="name">Bathrooms</label>
							<input type="number" name="bathrooms" class="form-control @error('bathrooms') is-invalid @enderror  "	placeholder="Enter number of bathrooms">
							@error('bathrooms')
								<span class="invalid-feedback" role="alert">
									<strong>{{$message}}</strong>
								</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="description">Choose Category</label>
							<select name="category" class="form-control @error('category') is-invalid @enderror ">
								<option value="">Select</option>
								@foreach (App\Models\Category::all() as $key => $category)
									<option 
										value="{{$category->id}}" 
									>
										{{$category->name}}
									</option>
								@endforeach
							</select>
						</div>
                        <div class="form-group">
							<div class="custom-file">
								<input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror   mt-3" id="customFile">
								<label class="custom-file-label text-dark mt-1" for="customFile">Choose file</label>
								@error('image')
									<span class="invalid-feedback" role="alert">
										<strong>{{$message}}</strong>
									</span>
								@enderror
							</div>
						</div>

						<button type="submit" class="btn btn-dark mt-3" style="border-color:rgb(36,156,76);" >Submit</button>
					</form>
				</div>
			</div>
	</div>
    <!--Row-->

</div>



@endsection