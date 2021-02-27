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
    <form action="/admin/subcategory/{{$subcategory['id']}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label"> Name </label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Subcategory Name" type="text" name="sub_name" value="{{$subcategory['sub_name']}}">
                @error('sub_name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description </label>
            <div class="col-sm-12 col-md-10">
                <textarea class="form-control" placeholder="Subcategory Description" name="sub_desc" >{{$subcategory ->sub_desc}}</textarea>
                @error('sub_name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Image </label>
            <div class="col-sm-12 col-md-10">
                <div class="custom-file">
                    <input type="file" name="img" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
                @error('sub_name')
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
            <input class="btn btn-primary" type="submit" value="Update" name="submit">
        </div>
    </form>
</div>
<!-- Form End -->
@endsection