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
        <div>Categories</div>
      </h1>  
        <div class="card">
          <div class="card-header">
            <h4><strong>Add Category</strong></h4>
            @can('category-list')
            <a href="{{route('category.index')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="view categories">View Categories</a>
            @endcan
          </div>
          <div class="card-body">
               <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                  @csrf 
                  @method('post')
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="member">Category Name</label>
                      <input id="member" type="text" class="form-control" name="catname" autofocus >
                    </div>
                    
                    <div class="form-group col-12">
                      <label for="email">Description</label>
                      <textarea name="description" class="form-control" id="services"  placeholder="Write category description" ></textarea>
                    </div>
                    <div class="form-group col-12">
                      <label for="services">Image</label>
                      <input id="services" type="file" class="form-control" name="image">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Submit
                    </button>
                  </div>
                </form>
          </div>
      </div>
     </section> 
</div>
</div>
@endsection
