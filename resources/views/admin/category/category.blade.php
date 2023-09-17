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
             @if(Session::has('Success'))
                <div class="alert alert-success" role="alert">
              {{Session::get('Success')}}
               </div>
              @endif
            <div class="card">
              <div class="card-header">
                <h4><strong>Category Table</strong></h4>
                @can('category-create')
                <a href="{{route('category.create')}}" class="btn btn-primary btn-action mr-1 float-right" data-toggle="tooltip" title="Add Category">Add Category</a>
                @endcan
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                      <th scope="col">S/N</th>
                      <th scope="col">Category Name</th>
                      <!-- <th scope="col">Sub-category</th> -->
                      <th scope="col">Discription</th>
                      <th scope="col">Image</th>
                      @canany(['category-edit','category-delete'])
                      <th scope="col">Action</th>
                      @endcanany
                      </tr>
                    </thead>
                    <tbody>
                    @php 
                     $i = 1
                    @endphp
                    @foreach ($categorys as $category)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$category->Categoryname}}</td>
                        <!-- <td>
                          <ul style="list-style: none;">
                            <li><i class="fa fa-caret-right"></i></li>
                          </ul>   
                       </td> -->
                        <td>{{$category->Description}}</td>
                        <td><img src="{{asset('asset/img/categories/'.$category->Image)}}" alt="image" width="100px" height="50px"></td>
                        <td>
                          <div class="d-flex">
                            <form action="{{route('category.destroy',$category->Category_Id )}}"class="d-flex" method="POST">
                            @csrf 
                            @method('delete')
                            @can('category-edit')
                            <a href="{{url('category/'.$category->Category_Id.'/edit')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="ion ion-edit"></i></a>
                            @endcan
                          
                            @can('category-delete')
                           <button type="Submit" onclick="return confirm('Are you sure to delete this category?')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></button>
                           @endcan
                          </form>
                         </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
     </section> 
    </div>
@endsection
