@extends('layouts.app')

@section('content')

<div class="container">
	<div class="mb-5">
		<div class="row justify-content-center">
			<div class="">
        <div class="gallery-wrap">
          <div class="img-big-wrap">
            <img src="{{Storage::url($property->image)}}"  width="450" >
          </div>
					<div class="text-dark">
						<h3 class="title mb-3">{{$property->address}}</h3>
							<p>${{$property->price}}</p>
					</div>
					<ul class="text-dark">
						<li>{{$property->bedrooms}} Bed or Beds</li>
						<li>{{$property->bathrooms}} Bath or Baths</li>
					</ul>
					<div>

						<like-button property-id="{{ $property->id }}" likes={{ $likes }}></like-button>
					</div>
        </div>
      </div>
		</div>
	</div>

	@if (count($propertyFromSameCategories) > 0)
		<div>
			<h3 class="text-white">Similar Homes You May Like</h3>

			<div class="row">
				@foreach ($propertyFromSameCategories as $property)
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
							<img src="{{Storage::url($property->image)}}" alt="">
							<div class="card-body bg-dark text-white">
								<p class="card-text">
									${{$property->price}}
								</p>
								<p class="card-text">
									{{$property->address}}
								</p>
								<p class="card-text">
									{{$property->bedrooms}} Bedrooms
								</p>
								<p class="card-text">
									{{$property->bathrooms}} Bathrooms
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	@else

	@endif
</div>

@endsection
