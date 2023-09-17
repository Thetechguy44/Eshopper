<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::with('subcategories')->get();
        return view('admin.category.category', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->Categoryname =  $request->catname;
        $category->Description = $request->description;
        $category->Image = $request->image;
        if($request->hasfile('image')){
           $file = $request->file('image');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file->move('asset/img/categories/', $filename);
           $category->Image = $filename;
        }
        $category->save();
        return redirect()->route('category.index')->with('Success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $categorys = Category::where('Category_Id','=',$id)->first();
        return view('admin.category.edit-category', compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // dd($id);
        $catname =  $request->catname;
        $description = $request->description;
        $image = $request->image;
        if($request->hasfile('image')){
            $destination = 'asset/img/categories/';
            if(File::exists($destination)){
                File::delete($destination);
            }
           $file = $request->file('image');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file->move('asset/img/categories/', $filename);
           $image = $filename;
        }
        Category::where('Category_Id','=',$id)->update([
            'Categoryname'=>$catname,
            'Description'=>$description,
            'Image'=>$image
        ]);
        return redirect()->route('category.index')->with('Success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::where('Category_Id','=',$id)->delete();
        return redirect()->route('category.index')->with('Success', 'Category deleted successfully');
    }
}
