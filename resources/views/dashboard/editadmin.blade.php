@extends('dashboard.layout')
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Update Data Admin</h4>
        </div>
    </div>
    <form action="/admin/updateadmin/{{$admin['id']}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Admin name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="Johnny Brown" name="admin_name" value="{{$admin['name']}}">
                @error('name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label"> Admin Email</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="johnny@example.com" type="email" name="admin_email" value="{{$admin['email']}}">
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
            <input class="btn btn-primary" type="submit" value="Update" name="submit">
        </div>
    </form>
</div>
@endsection