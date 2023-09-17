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
        <div>Sub-Sub-Categories</div>
      </h1>
        <div class="card">
          <div class="card-header">
            <h4><strong>Add Sub-Sub-Category</strong></h4>
            @can('subsubcategory-list')
            <a href="{{route('sub-subcategory.index')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="view sub-subcategories">View Sub-subcategories</a>
            @endcan
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('sub-subcategory.store')}}">
                @csrf 
                @method('post')
              <div class="row">
                <div class="form-group col-12">
                  <label for="subsubcat">Sub-subcategory</label>
                  <input id="subsubcat" type="text" class="form-control" name="subsubcat" autofocus>
                </div>
                <div class="form-group col-12">
                  <label for="last_name">Subcategory</label>
                  <select name="subcategory" class="form-select form-control" aria-label="Select Subcategory">
                      <option selected="" value="">Select Subcategory</option>
                      @foreach ($subcategorys as $sscategory)
                      <option value="{{$sscategory->Subcategory_Id}}">{{$sscategory->Subcategory}}</option>
                      @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
              </div>
            </form>
          </div>
      </div>
     </section> 
</div>
</div>
@endsection