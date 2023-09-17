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
        @if(Session::has('Success'))
         <div class="alert alert-success" role="alert">
           {{Session::get('Success')}}
         </div>
         @endif
        <div class="card">
          <div class="card-header">
            <h4>Products Table</h4>
            @can('product-create')
            <a href="{{route('product.create')}}" class="btn btn-primary btn-action mr-1 float-right" data-toggle="tooltip" title="Add Product">Add Product</a>
            @endcan
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Product</th>
                    <th scope="col">Sub-subcategory</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qyt</th>
                    @canany(['product-edit','product-delete'])
                    <th scope="col">Action</th>
                    @endcanany
                  </thr>
                </thead>
                <tbody>
                  @php 
                  $i = 1
                  @endphp
                  @foreach ($products as $product)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product->Name}}</td>
                    <td>{{$product->subsubcategories->Name}}</td>
                    <td><img src="{{asset('asset/img/products/'.$product->Image)}}" alt="image" width="50px" height="50px" style="border-radius:50%;"></td></td>
                    <td>{{$product->Description}}</td>
                    <td>{{$product->Color}}</td>
                    <td>${{$product->Price}}</td>
                    <td>{{$product->Qyt}}</td>
                    <td>
                    <div class="d-flex">
                      <form action="{{route('product.destroy',$product->Product_Id )}}"class="d-flex" method="POST">
                         @csrf 
                         @method('delete')
                           @can('product-edit')
                           <a href="{{url('admin/product/'.$product->Product_Id.'/edit')}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="ion ion-edit"></i></a>
                           @endcan
                           <!-- <a href="{{route('product.destroy',$product->Product_Id )}}" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></a> -->
                           @can('product-delete')
                           <button type="Submit" onclick="return confirm('Are you sure to delete this product?')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Remove" data-original-title="Delete"><i class="ion ion-trash-b"></i></button>
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
      </div>
     </section> 
</div>
@endsection
