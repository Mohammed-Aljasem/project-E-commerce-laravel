@extends('dashboard.layout')
@section('content')
    <!-- Forms Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Add product</h4>
            </div>
        </div>
        <form action="/admin/product/{{$product['id']}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="seftey" name="pro_name" value="{{$product['pro_name']}}">
                    @error('pro_name')
                        <small class='text-danger'>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product Price</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="10 JD" type="text" name="pro_price" value="{{$product['pro_price']}}">
                    @error('pro_price')
                        <small class='text-danger'>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Primary Image</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="product image" type="file" name="file">
                    @error('file')
                        <small class='text-danger'>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product Descrption</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Product description" type="text" name="pro_desc" value="{{$product['pro_desc']}}">
                    @error('pro_desc')
                        <small class='text-danger'>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product discount</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="0.20" type="text" name="pro_discount" value="{{$product['pro_discount']}}">
                    @error('pro_discount')
                        <small class='text-danger'>{{ $message }}</small>
                    @enderror
                </div>
            </div>            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Subcategory Name </label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="subcategory_id">
                        <option selected="">Choose ....</option>
                        @foreach ($subcategories as $sub)
                            <option value="{{$sub['id']}}">{{$sub['sub_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn-list">
                <input class="btn btn-primary" type="submit" value="Update" name="submit">
            </div> 
        </form>
    </div>

@endsection

