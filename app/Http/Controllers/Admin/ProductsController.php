<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use File;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('Subsubcategories')->get();
        return view('admin.product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subsubcats = Subsubcategory::all();
       return view('admin.product.add-product', compact('subsubcats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Products();
        $product->Name = $request->product;
        $product->Subsubcat_Id = $request->subsubcat;
        $product->Image = $request->product_image;
        $product->Description = $request->description;
        $product->Color = $request->color;
        $product->Price = $request->price;
        $product->Qyt = $request->qyt;
        if($request->hasfile('product_image'))
        {
            $image_file = $request->file('product_image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time().'.'. $img_extension;
            $image_file->move('asset/img/products/', $img_filename );
            $product->Image = $img_filename;
        }
        $product->save();
        return redirect()->route('product.index')->with('Success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subsubcats = Subsubcategory::all();
        $products = Products::where('Product_Id', '=', $id)->first();
        return view('admin.product.edit-product', compact('subsubcats','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products, $id)
    {
        $product = $request->product;
        $subsubcat = $request->subsubcat;
        $image = $request->image;
        $description = $request->description;
        $color = $request->color;
        $price = $request->price;
        $qyt = $request->qyt;
        if($request->hasfile('product_image'))
        {
            $filepath_image = 'asset/img/products/'.$products->Image;
            if(File::exists($filepath_image)){
                File::delete($filepath_image);
            }
            $image_file = $request->file('product_image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time().'.'. $img_extension;
            $image_file->move('asset/img/products/', $img_filename );
            $image = $img_filename;
        }
        Products::where('Product_Id', '=', $id)->update([
            'Name'=>$product,
            'Subsubcat_Id'=>$subsubcat,
            'Image'=>$image,
            'Description'=>$description,
            'Color'=>$color,
            'Price'=>$price,
            'Qyt'=>$qyt,
        ]);
        return redirect()->route('product.index')->with('Success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Products::where('Product_Id', '=', $id)->delete();
        return redirect()->route('product.index')->with('Success', 'Product deleted successfully');
    }
}
