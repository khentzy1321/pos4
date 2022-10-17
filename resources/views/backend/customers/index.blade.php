@extends('layouts.admin')

@section('content')
@section('title', 'Customer')

@section('css')
<script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">

@endsection


<div class="card-header">
    <h2> Customer List<a href="#" data-toggle="modal" data-target="#modalCreateCustomer" class="btn btn-primary float-right">
        Add Customer</a></h2>
</div>

<div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                        <tr>
                              <th>ID</th>
                              {{-- <th>Avatar</th> --}}
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                 @foreach ($customers as $customer)
                       <tr>
                                 <td>{{$customer->id}}</td>
                                 {{-- <td>
                                    <img src="{{ $customer->getAvatarUrl() }}" alt="" width="50" height="40">
                                 </td> --}}
                                 <td>{{$customer->first_name}}</td>
                                 <td>{{$customer->last_name}}</td>

                                 <td>{{$customer->email}}</td>
                                 <td>{{$customer->phone}}</td>
                                 <td>{{$customer->address}}</td>

                     <td>
                         <a href="{{ route('customers.edit', $customer) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                         <button id="btn" class="btn btn-outline-danger btn-sm btnDelete" data-url="{{route('customers.destroy', $customer->id)}}">
                            <i class="fas fa-trash" ></i></button>
                     </td>
               </tr>
               @endforeach
                </tbody>
         </table>
         <div class="d-flex justify-content-center">{{ $customers->render() }} </div>
    </div>
</div>
@include('backend.customers.modal.create')


@endsection


@section('js')


@endsection
