@extends('dashboard.layout')
@section('content')
{{-- sub_name	sub_desc	sub_img	cat_id --}}
<!-- Form Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Add SubCategory Forms</h4>
            <br>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label"> Name </label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Subcategory Name" type="text" name="sub_name">
                @error('sub_name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description </label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" placeholder="Subcategory Description" name="sub_desc"></textarea>
                @error('sub_name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Image </label>
            <div class="col-sm-12 col-md-10">
                <div class="custom-file">
                    <input class="form-control" placeholder="Add image" type="file" name="img">
                </div>
                @error('img')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Category Name </label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="category_id">
                    <option selected="">Choose ....</option>
                    @foreach ($categories as $cat)
                        <option value="{{$cat['id']}}">{{$cat['cat_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="btn-list">
            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
        </div>
    </form>
</div>
<!-- Form End -->
<!-- table  start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Subcategory table</h4>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Descreption</th>
                <th scope="col">Image</th>
                <th scope="col">Category Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $sub)
                <tr>
                    <th scope="row">{{$sub['id']}}</th>
                    <td>{{$sub['sub_name']}}</td>
                    <td>{{$sub['sub_desc']}}</td>
                    <td>
                        <img src="/images/{{$sub['sub_img']}}" width="65px"  height="65px">
                    </td>
                    @foreach ($categories as $cat)
                        @if ($cat['id']== $sub['category_id'])
                        <td> {{$cat['cat_name']}}</td>
                        @endif
                    @endforeach
                    <td>
                        <a class="btn-sm btn-warning" href="/admin/subcategory/{{$sub['id']}}/editsubcat" role="button"> Edit </a>
                    </td>
                    <td><a class="btn-sm btn-danger" href="/admin/subcategory/{{$sub['id']}}" role="button">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- table End -->
@endsection