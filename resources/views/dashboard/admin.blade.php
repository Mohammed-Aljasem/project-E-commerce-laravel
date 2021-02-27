@extends('dashboard.layout')
@section('content')
    <!-- Forms Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Add Admin</h4>
            </div>
        </div>
        <form action="/admin/addadmin" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Admin name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Johnny Brown" name="admin_name">
                    @error('name')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"> Admin Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="johnny@example.com" type="email" name="admin_email">
                    @error('email')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"> Admin Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="password" type="password" name="admin_password">
                    @error('password')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="btn-list">
                <input class="btn btn-primary" type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
    <!-- Forms End -->
    <!-- table  start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Admins table</h4>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <th scope="row">{{$admin['id']}}</th>
                        <td>{{$admin['name']}}</td>
                        <td>{{$admin['email']}}</td>
                        <td>
                            <a class="btn-sm btn-warning" href="/admin/editadmin/{{$admin['id']}}/editadmin" role="button"> Edit </a>
                        </td>
                        <td><a class="btn-sm btn-danger" href="/admin/delateadmin/{{$admin['id']}}" role="button">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--table End -->
@endsection
