@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid" id="container-wrapper">

		<!-- Breadcrumb -->		
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Properties</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Property</li>
      </ol>
    </div>

        <!-- Session alert messages -->
        @if (Session::has('message'))
          <div class="alert alert-success">
            {{Session::get('message')}}
          </div>
        @endif

    <div class="row">
      <div class="col-lg-12 mb-4">



        <!-- Datatables -->
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Properties</h6>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Address</th>
                  <th>Bedrooms</th>
                  <th>Bathrooms</th>
									<th>Category</th>
									<th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (count($properties) > 0)
                  @foreach ($properties as $property)
                    <tr>
                      <td>{{ $property->price }}</a></td>
                      <td>
                        <img src="{{ Storage::url($property->image) }}" width="100">
                      </td>
                      <td>{{ $property->address }}</td>
                      <td>{{ $property->bedrooms }}</td>
											<td>{{$property->bathrooms}}</td>
											<td>{{$property->category->name}}</td>
                      <td>
												<div class="btn-group" role="group">
													<a class="btn btn-sm btn-primary" href="{{ route('property.edit', [$property->id]) }}">Edit</a>
													<form 
														action="{{ route('property.destroy', [$property->id]) }}"
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
                    <td>No property created yet.</td>
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