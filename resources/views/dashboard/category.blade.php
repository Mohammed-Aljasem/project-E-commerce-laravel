@extends('dashboard.layout')
@section('content')
    <!-- Forms Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Add Category</h4>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Clothes" name="cat_name">
                    @error('cat_name')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category Descreption </label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Category Description" type="text" name="cat_desc">
                    @error('cat_desc')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Category image</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Add image" type="file" name="file">
                    @error('file')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="btn-list">
                <input class="btn btn-primary" type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Categories table</h4>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cat Name</th>
                    <th scope="col">Cat Descreption</th>
                    <th scope="col">Cat image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category['id']}}</th>
                        <td>{{$category['cat_name']}}</td>
                        <td>{{$category['cat_desc']}}</td>
                        <td><img width="65px" src="/images/{{$category['cat_img']}}"></td>
                        <td>
                            <a class="btn-sm btn-warning" href="/admin/category/{{$category['id']}}/editcategory" role="button"> Edit </a>
                        </td>
                        <td><a class="btn-sm btn-danger" href="/admin/category/{{$category['id']}}" role="button">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection