<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategory-list|subcategory-create|subcategory-edit|subcategory-delete', ['only' => ['index','show']]);
        $this->middleware('permission:subcategory-create', ['only' => ['create','store']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subcategory-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorys = Subcategory::with('categories')->get();
        //dd($subcategorys);
        return view('admin.sub-category.sub-category', compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::all();
        return view('admin.sub-category.add-subcategory', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->Subcategory = $request->subcat;
        $subcategory->Category_Id = $request->category;
        ///dd($subcategory);
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('Success', 'Subcategory created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //dd($id);
        $categorys = Category::all();
        $subcategorys = Subcategory::where('Subcategory_Id','=',$id)->first();
        return view('admin.sub-category.edit-subcategory', compact('categorys','subcategorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subcat = $request->subcat;
        $cat_id = $request->category;
        Subcategory::where('Subcategory_Id','=',$id)->update([
            'Subcategory' => $subcat,
            'Category_Id' => $cat_id
        ]);
        return redirect()->route('subcategory.index')->with('Success', 'Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subcategory::where('Subcategory_Id','=',$id)->delete();
        return redirect()->route('subcategory.index')->with('Success', 'Subcategory deleted successfully');
    }
}
