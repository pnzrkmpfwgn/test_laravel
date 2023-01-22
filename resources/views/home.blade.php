@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ auth()->user()->name }}!

                    <h3>My Saved Properties</h3>
                    @if (auth()->user()->like)
                        @foreach (auth()->user()->like as $liked)
                            <div class="col-4 pb-4">
                                <a href="{{route('frontproperty.show', [$liked->id])}}">
                                    <img class="w-100" src="{{ Storage::url($liked->image) }}" alt="">
                                </a>
                                <like-button 
                                    property-id="{{ $liked->id }}" 
                                    likes={{ $likes = auth()->user() ? auth()->user()->like->contains($liked->id) : false }}
                                ></like-button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
