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
                <h4><strong>Edit Category</strong></h4>
              </div>
              <div class="card-body">
              <form method="POST" action="{{route('category.update',$categorys->Category_Id)}}" enctype="multipart/form-data">
                @csrf 
                @method('put')
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="member">Category Name</label>
                      <input id="member" type="text" class="form-control" name="catname" autofocus required value="{{$categorys->Categoryname}}">
                    </div>
                    
                    <div class="form-group col-12">
                      <label for="email">Description</label>
                      <textarea name="description" class="form-control" id="services"  placeholder="Write category description" required>{{$categorys->Description}}</textarea>
                    </div>
                    <div class="form-group col-12">
                      <label for="services">Image</label><br>
                      <img src="{{asset('asset/img/categories/'.$categorys->Image)}}" alt="" width="100" height="100px"><br><br>
                      <input id="services" type="file" class="form-control" name="image" value="{{$categorys->Image}}">
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
         </section> 
    </div>
@endsection
