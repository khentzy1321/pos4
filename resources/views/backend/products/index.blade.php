@extends('layouts.admin')

@section('content')
@section('title', 'Product')

@section('css')
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection

<div class="col-md-4 float-right">
    <form action="{{ route('searchProducts') }}" method="GET">
        <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search Product?" required/>
        <span class="input-group-repend">
        <button type="submit" class="btn btn-outline-primary btn-lg">Search</button>
    </span>
    </div>
    </form>
</div>
<div class="card-header">
    <h2> Product List<a href="" data-toggle="modal" data-target="#createProductModal" class="btn btn-outline-info float-right text-black">
        <i class="mdi mdi-plus-outline">Add Product</i>
        </a></h2>
</div>

<div class="card w-100 mt-4">
        <div class="card-body ">
            <table class="table table-bordered table-secondary">
                <thead>
                        <tr>

                              <th>Product_Name</th>
                              <th>Description</th>
                              <th>Unit Price</th>
                              <th>Quantity</th>
                              <th>Status Stocks</th>
                              <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                 @foreach ($products as $product)
                       <tr>

                                 <td>{{$product->name}}</td>
                                 <td>{{$product->description}}</td>
                                 <td>{{number_format($product->price, 2)}}</td>
                                 <td>{{$product->quantity}}</td>
                                 <td>@if ($product->stocks <= 100)
                                    <span class="badge badge-danger">Low Stock: > {{$product->stocks}} </span>
                                    @else
                                    <span class="badge badge-success">High Stock: < {{$product->stocks}}</span>
                                @endif</td>

                     <td>
                        <a href="#" data-toggle="modal" data-target="#editProductModal{{ $product->id }}" class="btn btn-outline-success btn-sm"><i class="mdi mdi-pencil"></i></a>

                         <button href="#" data-toggle="modal" data-target="#deleteProductModal{{ $product->id }}" class="btn btn-outline-danger btn-sm btnDelete">
                                <i class="mdi mdi-trash-can" ></i></button>
                     </td>
               </tr>
               <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                 <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Name" value="{{ old('name', $product->name) }}">
                                       @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                </div>
                                 <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                                placeholder="Name" >{{ old('description', $product->description) }} </textarea>
                                       @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
                                                placeholder="Price" value="{{ old('price', $product->price) }}">
                                       @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Price</label>
                                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                                placeholder="Quantity" value="{{ old('quantity', $product->quantity) }}">
                                       @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stocks">Price</label>
                                    <input type="text" name="stocks" class="form-control @error('stocks') is-invalid @enderror" id="stocks"
                                                placeholder="Stocks" value="{{ old('stocks', $product->stocks) }}">
                                       @error('stocks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stocks">Stock</label>
                                    <input type="text" name="stocks" class="form-control @error('stocks') is-invalid @enderror" id="stocks"
                                                placeholder="Stock" value="{{ old('stocks', $product->stocks) }}">
                                       @error('stocks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                       @enderror
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update Product</button>
                                </div>

                        </form>
                    </div>
                  </div>
                </div>
              </div>

              {{-- Deelete Modal --}}

                <div class="modal fade" id="deleteProductModal{{ $product->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Product?</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <p>
                        <h2>  Are you sure you want to delete this {{ $product->name }} ??</h2>

                    </p>
                    <div class="modal-footer">

                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete User</button>

                    </div>
                </form>
            </div>
        </div>
        </div>
            </div>

               @endforeach
                </tbody>
         </table>
        </div>
        <div class="d-flex justify-content-center"> {{ $products->render() }}</div>
</div>

@include('backend.products.modal.create')

@endsection
