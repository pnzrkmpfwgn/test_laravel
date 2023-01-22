<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  
    }

    public function store(Property $property) {
      return auth()->user()->like()->toggle($property);
    }
}
