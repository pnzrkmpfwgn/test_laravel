<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
			// get all users where is_admin column is not 1
    	$users = User::where('is_admin', '!=', 1)->get();
		$user = User::paginate(7);

    	return view('admin.user.index', compact('users'));
    }
}
