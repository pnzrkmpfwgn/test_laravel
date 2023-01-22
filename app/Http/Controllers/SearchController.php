<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) {
      $address = $request->address;
      $category = $request->category;
      $bedrooms = $request->bedrooms;

      $min = $request->min;
      $max = $request->max;
      //dd($address);
      //dd(gettype($min));

      $properties = Property::query();

      // if($request->address != '' && $request->category != ''){
      //   $properties = Property::where('address', 'LIKE', '%'.$address.'%')->where('category_id', $category)->get();
      // }

      // if($request->category != '' && $request->bedrooms != ''){
      //   $properties = Property::where('category_id', $category)->where('bedrooms', $bedrooms)->get();
      // }

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

      // if($request->address != '' && $request->bedrooms != ''){
      //   $properties = Property::where('address', 'LIKE', '%'.$address.'%')->where('bedrooms', $bedrooms)->get();
      // }

      // if($request->address != '' && $request->category != '' && $request->bedrooms != ''){
      //   $properties = Property::where('address', 'LIKE', '%'.$address.'%')->where('category_id', $category)->where('bedrooms', $bedrooms)->get();
      // }

      if($min != '' && $max != ''){
        $min = (int)(str_replace(',', '', $min));
        $max = (int)(str_replace(',', '', $max));
        $properties->whereBetween('price', [
          $min, $max
        ]);
      }

      //dd($properties->toSql());
       return view('property', ['properties' => $properties->get()]);
    }
}
