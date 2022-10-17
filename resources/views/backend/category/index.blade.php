@extends('layouts.admin')

@section('content')

<div class="col-md-4 float-right">
    <form action="{{ route('search') }}" method="GET">
        <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search Category?" required/>
        <span class="input-group-repend">
        <button type="submit" class="btn btn-outline-primary btn-lg">Search</button>
    </span>
    </div>
    </form>
</div>

<div class="card-header">
    <h2> Categories <button href="#" data-toggle="modal" data-target="#createCategoryModal" class="btn btn-outline-info text-black float-right" >
       <i class="mdi mdi-plus-outline"> Add Category</i> </button></h2>
</div>

<div class="card w-100 mt-4">
        <div class="card-body card-inverse-light">
            <table class="table table-bordered table-secondary">
                <thead>
                        <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Warranty</th>
                              <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                 @foreach ($categories as $category)
                      <tr>

                                 <td>{{$category->name}}</td>
                                 <td>{{$category->description}}</td>
                                 <td> {{$category->warranty}} days</td>
                     <td>
                        <a href="#" data-toggle="modal" data-target="#categoryEditModal{{ $category->id }}" class="btn btn-outline-success btn-sm"><i class="mdi mdi-pencil"></i></a>

                         <button type="button" data-toggle="modal" data-target="#deleteCategoryModal{{ $category->id }}" class="btn btn-outline-danger btn-sm btnDelete">
                                <i class="mdi mdi-trash-can" ></i></button>
                     </td>
               </tr>
               <div class="modal fade" id="categoryEditModal{{ $category->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            @method('put')
                               <div class="form-group">
                                  <label for="">Name</label>
                                  <input type="text" name="name" id="" value="{{ $category->name }}" class="form-control">
                              </div>
                               <div class="form-group">
                                  <label for="">Descrption</label>
                                  <textarea type="text" name="description" id="" class="form-control">{{ $category->description }}
                                  </textarea>
                                </div>
                               <div class="form-group">
                                  <label for="">Warranty</label>
                                  <input type="text" name="warranty" id="" value="{{ $category->warranty }}" class="form-control">
                               </div>

                              <div class="modal-footer">
                                <button class="btn btn-primary btn-block"> Update Category</button>
                              </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Delete Modal --}}
              <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Users?</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <p>
                                Are you sure you want to delete this {{ $category->name }} ??
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
        <div class="d-flex justify-content-center"> {{ $categories->render() }}</div>
       </div>
      </div>
    </div>

      @include('backend.category.modal.create')
@endsection
