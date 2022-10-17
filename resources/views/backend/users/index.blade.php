@extends('layouts.admin')

@section('content')

            <div class="card w-100">
                <div class="card-header">
                    <form action="{{ route('searchUsers') }}" method="GET">
                        <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search User?" required/>
                        <span class="input-group-repend">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Search</button>
                    </span>
                    </div>
                    </form>
                    <h3 style="float: left" class="text-center" >Users</h3>

                    <a href="#" class="btn btn-outline-primary" style="float: right" data-toggle="modal" data-target="#addUserModal">
                        <i class="mdi mdi-plus-outline">Add User</i></a> </div>
                <div class="card-body">
                    <table class="table table-bordered table-left table-secondary">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if ($user->is_admin == 1) Admin
                                    @else Standard User
                                @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" data-toggle="modal" data-target="#userEditModal{{ $user->id }}" class="btn btn-outline-success btn-sm">
                                            <i class="mdi mdi-pencil"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="userEditModal{{ $user->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('users.update', $user->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" id="" value="{{ $user->name }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" id="" value="{{ $user->email }}"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="password" name="password" id="" readonly value="{{ $user->password }}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Role">Role</label>
                                                    <select name="is_admin" id="is_admin" class="form-control">
                                                    <option value="1" @if ($user->is_admin == 1)
                                                        selected
                                                    @endif>Admin</option>
                                                    <option value="2" @if ($user->is_admin == 2)
                                                        selected
                                                        @endif>Standard User</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                <button class="btn btn-primary btn-block"> Update User</button>
                                                </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                    {{-- Deleting moddal --}}

                                        <div class="modal fade" id="deleteUserModal{{ $user->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Users?</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <p>
                                            <h2>  Are you sure you want to delete this {{ $user->name }} ??</h2>

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
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
        </div>
{{-- modal  User Create--}}

<div class="modal fade" id="addUserModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ route('users.store') }}" method="post">

            @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="is_admin" id="" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Standard User</option>
                    </select>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary btn-block"> Save User</button>
                </div>
        </form>
    </div>
    </div>
</div>
</div>


@endsection




