<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subsubcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subsubcategory-list|subsubcategory-create|subsubcategory-edit|subsubcategory-delete', ['only' => ['index','show']]);
        $this->middleware('permission:subsubcategory-create', ['only' => ['create','store']]);
        $this->middleware('permission:subsubcategory-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subsubcategory-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsubcats = Subsubcategory::with('subcategory.categories')->get();
        //dd($subcategorys);
        return view('admin.subsub-category.sub-subcategory', compact('subsubcats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategorys = Subcategory::all();
        return view('admin.subsub-category.add-sub-subcategory', compact('subcategorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subsubcat = new Subsubcategory();
        $subsubcat->Name = $request->subsubcat;
        $subsubcat->Subcategory_Id = $request->subcategory;
        //dd($subsubcat);
        $subsubcat->save();
        return redirect()->route('sub-subcategory.index')->with('Success', 'Sub-subcategory created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subsubcategory $subsubcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcategorys = Subcategory::all();
        $subsubcats = Subsubcategory::where('Subsubcategory_Id', '=', $id)->first();
        return view('admin.subsub-category.edit-sub-subcategory', compact('subcategorys', 'subsubcats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subsubname = $request->subsubcat;
        $subcat = $request->subcategory;
        Subsubcategory::where('Subsubcategory_Id', '=', $id)->update([
            'Name'=>$subsubname,
            'Subcategory_Id'=>$subcat
        ]);
        return redirect()->route('sub-subcategory.index')->with('Success', 'Sub-subcategory created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subsubcategory::where('Subsubcategory_Id', '=', $id)->delete();
        return redirect()->route('sub-subcategory.index')->with('Success', 'Sub-subcategory deleted successfully');
    }
}
