<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all subcategories
        $subcategories = Subcategory::get();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form input
        $this->validate($request, [
            'num_bedrooms' => 'required|unique:subcategories',
            'category' => 'required'
        ]);
        // create subcategory
        Subcategory::create([
            'num_bedrooms' => $request->num_bedrooms,
            'category_id' => $request->category
        ]);

        return redirect()->back()->with('message', 'Subcategory created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate form data 
        $this->validate($request, [
            'num_bedrooms' => 'required',
            'category' => 'required'
        ]);
        // get subcategory by id
        $subcategory = Subcategory::find($id);

        // set form data on the request object
        $subcategory->num_bedrooms = $request->num_bedrooms;
        $subcategory->category_id = $request->category;

        // save new subcategory to database
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('message', 'Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get subcategory by id
        $subcategory = Subcategory::find($id);

        // delete it 
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('message', 'Subcategory deleted successfully');
    }
}
