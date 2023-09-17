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
        <div>Sub Categories</div>
      </h1>
        @if(Session::has('Success'))
         <div class="alert alert-success" role="alert">
           {{Session::get('Success')}}
         </div>
         @endif
        <div class="card">
          <div class="card-header">
            <h4><strong>Sub Category Table</strong></h4>
            @can('subcategory-create')
            <a href="{{route('subcategory.create')}}" class="btn btn-primary btn-action mr-1 float-right" data-toggle="tooltip" title="Add Subcategory">Add Subcategory</a>
            @endcan
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub-Category</th>
                    @canany(['subcategory-edit','subcategory-delete'])
                    <th scope="col">Action</th>
                    @endcanany
                </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1
                  @endphp
                  @foreach ($subcategorys as $subcategory)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$subcategory->categories->Categoryname}}</td>
                    <td>{{$subcategory->Subcategory}}</td>
                    <td>
                         <div class="d-flex">
                            <form action="{{route('subcategory.destroy',$subcategory->Subcategory_Id)}}"class="d-flex" method="POST">
                            @csrf 
                            @method('delete')
                            @can('subcategory-edit')
                            <a href="{{url('admin/subcategory/'.$subcategory->Subcategory_Id.'/edit')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="ion ion-edit"></i></a>
                            @endcan
                            
                            @can('subcategory-delete')
                           <button type="Submit" onclick="return confirm('Are you sure to delete this subcategory?')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></button>
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
</div>
@endsection