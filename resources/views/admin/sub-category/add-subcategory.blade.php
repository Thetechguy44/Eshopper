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
        <div>Sub-Categories</div>
      </h1>  
        <div class="card">
          <div class="card-header">
            <h4><strong>Add Sub-Category</strong></h4>
            @can('subcategory-list')
            <a href="{{route('subcategory.index')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="view subcategories">View Subcategories</a>
            @endcan
          </div>
          <div class="card-body">
          <form method="POST" action="{{route('subcategory.store')}}">
                @csrf 
                @method('post')
                  <div class="row">
                  <div class="form-group col-12">
                      <label for="services">Subcategory</label>
                      <input id="member" type="text" class="form-control" name="subcat" autofocus >
                    </div>
                    <div class="form-group col-12">
                      <label for="">Category</label>
                      <div class="col-12">
                      <select name="category" class="form-select form-control" aria-label="Select Category">
                      <option selected="">Select Category</option>
                      @foreach ($categorys as $category)
                      <option value="{{$category->Category_Id}}">{{$category->Categoryname}}</option>
                      @endforeach
                      </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
          </div>
      </div>
     </section> 
</div>
</div>
@endsection