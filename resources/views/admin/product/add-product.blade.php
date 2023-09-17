@extends('layouts.app')
@section('content')
<div class="main-wrapper">
<div class="navbar-bg"></div>
@include('layouts.nav')
<div class="main-sidebar">
@include('layouts.aside')
</div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Products</div>
      </h1>
        <div class="card">
          <div class="card-header">
            <h4><strong>Add Product</strong></h4>
            @can('product-list')
            <a href="{{route('product.index')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="view products">View Products</a>
            @endcan
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf 
            @method('post')
              <div class="row">
                <div class="form-group col-12">
                  <label for="product">Product Name</label>
                  <input id="product" type="text" class="form-control" name="product" autofocus>
                </div>
                <div class="form-group col-12">
                  <label for="subsubcat">Sub-subcategory</label>
                  <select name="subsubcat" class="form-select form-control" aria-label="Select Sub-subcategory">
                      <option selected="" value="">Select Sub-subcategory</option>
                      @foreach ($subsubcats as $sscategory)
                      <option value="{{$sscategory->Subsubcategory_Id}}">{{$sscategory->Name}}</option>
                      @endforeach
                      </select>
                </div>
                <div class="form-group col-12">
                  <label for="product_image">Product Image</label>
                  <input id="product_image" type="file" class="form-control" name="product_image">
                </div>
              </div>
              <div class="form-group col-12">
                <label for="description">Product Description</label>
                <textarea name="description" class="form-control" id="description" style="height: 100px"></textarea>
              </div>
              <div class="form-group col-12">
                  <label for="color">Color</label>
                  <input id="color" type="text" class="form-control" name="color" autofocus>
                </div>
              <div class="form-group col-12">
                <label for="price">Product Price</label>
                <input id="price" type="number" class="form-control" name="price">
              </div>
              <div class="form-group col-12">
                  <label for="qyt">Qyt</label>
                  <input id="qyt" type="text" class="form-control" name="qyt" autofocus>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
            </form>
          </div>
      </div>
     </section> 
  </div>
</div>
@endsection
