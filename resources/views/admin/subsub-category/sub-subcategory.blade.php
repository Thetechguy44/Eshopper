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
            @can('subsubcategory-create')
            <a href="{{route('sub-subcategory.create')}}" class="btn btn-primary btn-action mr-1 float-right" data-toggle="tooltip" title="Add Sub-subcategory">Add Sub-subcategory</a>
            @endcan
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Category</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">Sub-subcategory</th>
                    @canany(['subsubcategory-edit','subsubcategory-delete'])
                    <th scope="col">Action</th>
                    @endcanany
                </tr>
                </thead>
                <tbody>
                  @php 
                  $i = 1
                  @endphp
                  @foreach ($subsubcats as $subsubcat)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$subsubcat->subcategory->categories->Categoryname}}</td>
                    <td>{{$subsubcat->subcategory->Subcategory}}</td>
                    <td>{{$subsubcat->Name}}</td>
                    <td>
                         <div class="d-flex">
                            <form action="{{route('sub-subcategory.destroy',$subsubcat->Subsubcategory_Id)}}"class="d-flex" method="POST">
                            @csrf 
                            @method('delete')
                            @can('subsubcategory-edit')
                            <a href="{{url('admin/sub-subcategory/'.$subsubcat->Subsubcategory_Id.'/edit')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="ion ion-edit"></i></a>
                            @endcan

                            @can('subsubcategory-delete')
                           <button type="Submit" onclick="return confirm('Are you sure to delete this Subsubcategory?')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></button>
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