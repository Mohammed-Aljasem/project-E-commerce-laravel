@extends('dashboard.layout')
@section('content')
<!-- Form Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">edit Category Forms</h4>
            <br>
        </div>
    </div>
    <form action="/admin/category/{{$category['id']}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- cat_name  cat_desc cat_img --}}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Categroy name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="category Name" type="text" name="cat_name" value="{{$category['cat_name']}}">
                @error('cat_name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Categroy name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="category Description" type="text" name="cat_desc" value="{{$category['cat_desc']}}">
                @error('cat_name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Category Image </label>
            <div class="col-sm-12 col-md-10">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
                @error('file')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="btn-list">
            <input class="btn btn-primary" type="submit" value="Update" name="submit">
        </div>
    </form>
</div>
<!-- Form End -->
@endsection