<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;


class FrontPropertyListController extends Controller
{
    public function index(Property $property, Request $request) {
        //dd($searchResults);
        $properties = Property::latest()->limit(9)->get();
        // random properties for carousel
        //$randomProperties= Property::inRandomOrder()->limit(3)->get();
        $randomPropertyIds = [];
        // foreach($randomProperties as $property){
        //     array_push($randomPropertyIds, $property->id);
        // }
        // $randomItemProperties = Property::where('id', '!=', $randomPropertyIds)->limit(3)->get();
        //dd($randomProperties);
        return view('property', compact('properties'));
    }

    public function show($id) {  
      $property = Property::find($id);

      //dd(auth()->user()->like->contains($property->id));

      // if the user is authed 
      $likes = auth()->user() ?
        // get the authed user's 'like' that contains the $property passed in 
        auth()->user()->like->contains($property->id) : false;

      //dd($likes);

      $propertyFromSameCategories = Property::inRandomOrder()
            ->where('category_id', $property->category_id)
            ->where('id', '!=', $property->id)
            ->limit(3)
            ->get();

      return view('show', compact('property', 'propertyFromSameCategories', 'likes'));
    }

    public function search(Request $request) {
      $address = $request->address;
      $category = $request->category;
      $bedrooms = $request->bedrooms;
      $min = $request->min;
      $max = $request->max;

      $properties = Property::query();

      if($address != ''){
        //dd($address);
        $properties->where('address', 'LIKE', '%'.$address.'%');
      }

      if($category != ''){
        $properties->where('category_id', $category);
      }

      if($bedrooms != ''){
        $properties->where('bedrooms', $bedrooms);
      }

      if($min != '' && $max != ''){
        $min = (int)(str_replace(',', '', $min));
        $max = (int)(str_replace(',', '', $max));
        $properties->whereBetween('price', [
          $min, $max
        ]);
      }

       return $properties->get();
    }
}
