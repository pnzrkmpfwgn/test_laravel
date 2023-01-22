@extends('admin.layouts.main')

@section('content')
  <div class="container-fluid" id="container-wrapper">
		
		<!-- Breadcrumb -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Subcategory Tables</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Subcategory Tables</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4">

				<!-- Session alert messages -->
				@if (Session::has('message'))
					<div class="alert alert-success">
						{{Session::get('message')}}
					</div>
				@endif
        
        <!-- Category Tables -->
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Subcategories</h6>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Num Bedrooms</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($subcategories) > 0)
                  @foreach ($subcategories as $key => $subcategory)
                    <tr>
                      <td><a href="#">{{ $key + 1 }}</a></td>
                      <td>{{ $subcategory->num_bedrooms }}</td>
                      <td>{{ $subcategory->category->name }}</td>

                      <td>
												<div class="btn-group" role="group">
													<a class="btn btn-sm btn-primary" href="{{ route('subcategory.edit', [$subcategory->id]) }}">Edit</a>
													<form 
														action="{{ route('subcategory.destroy', [$subcategory->id]) }}"
														method="post"
														onsubmit="return confirmDelete()"
													>
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-sm btn-danger">
															Delete
														</button>
													</form>
												</div>
                      </td>
                    </tr>
                  @endforeach
                    
                @else 
                    <td>No subcategories created yet.</td>
                @endif

              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
  <!---Container Fluid-->

@endsection