<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|unique:categories|max:255',
          'description' => 'required',
          'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        $image = $request->file('image')->store('public/files');

        // https://laravel.com/docs/8.x/structure#the-storage-directory
        // You should create a symbolic link at public/storage which points to this directory. You may create the link using the php artisan storage:link Artisan command.

        Category::create([
          'name' => $request->name,
          'slug' => Str::slug($request->name),
          'description' => $request->description,
          'image' => $image
        ]);

        return redirect()->back()->with('message', 'Category created successfully');
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
        // get category by id 
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
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
        // get category by id 
        $category = Category::find($id);
        // get image from the category 
        $image = $category->image;

        // Check for image in the request
        if($request->hasFile('image')) {
          // save the new image
          $image = $request->file('image')->store('public/files');
          // delete the old image
          \Storage::delete($category->image);
        }
        // save the new name, description and image in the category object then save to the database
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $image;
        $category->save();

        return redirect()->route('category.index')->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $filename = $category->image;

        $category->delete();
        \Storage::delete($filename);

        return redirect()->back()->with('message', 'Category deleted successfully');
    }
}
