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
            <h4><strong>Edit Sub-Category</strong></h4>
          </div>
          <div class="card-body">
          <form method="POST" action="{{route('subcategory.update', $subcategorys->Subcategory_Id)}}">
                @csrf 
                @method('put')
                  <div class="row">
                  <div class="form-group col-12">
                      <label for="services">Subcategory</label>
                      <input id="member" type="text" class="form-control" name="subcat" autofocus value="{{$subcategorys->Subcategory}}">
                    </div>
                    <div class="form-group col-12">
                      <label for="">Category</label>
                      <div class="col-12">
                      <select name="category" class="form-select form-control" aria-label="Select Category">
                      <option selected="" value="{{$subcategorys->Category_Id}}">{{$subcategorys->categories->Categoryname}}</option>
                      @foreach ($categorys as $scategory)
                      <option value="{{$scategory->Category_Id}}">{{$scategory->Categoryname}}</option>
                      @endforeach
                      </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Update
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