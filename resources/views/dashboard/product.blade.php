@extends('dashboard.layout')
@section('content')
    <!-- Forms Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Add product</h4>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product Name</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="seftey" name="pro_name">
                    @error('pro_name')
                        <small class='text-danger'>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product Price</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="10 JD" type="text" name="pro_price">
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
                    <input class="form-control" placeholder="Product description" type="text" name="pro_desc">
                    @error('pro_desc')
                        <small class='text-danger'>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product discount</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="0.20" type="text" name="pro_discount">
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
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Product Images</label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" name="images[]" class="form-control" placeholder="product images"  multiple>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
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
                <h4 class="text-blue h4">Products table</h4>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Primary Image</th>
                    <th scope="col">Product Descrption</th>
                    <th scope="col">Product Discount</th>
                    <th scope="col">Subcategory Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                {{-- pro_name	pro_price	pro_primary_img	 pro_desc	pro_discount --}}
                @foreach ($products as $pro)
                    <tr>
                        <th scope="row">{{$pro['id']}}</th>
                        <td>{{$pro['pro_name']}}</td>
                        <td>{{$pro['pro_price']}}</td>
                        <td>
                            <img src="/images/{{$pro['pro_primary_img']}}" width="65px"  height="65px">
                        </td>
                        <td>
                            {{$pro['pro_desc']}}
                        </td>
                        <td>
                            {{$pro['pro_discount']}}
                        </td>
                        @foreach ($subcategories as $sub)
                            @if ($sub['id']== $pro['subcategory_id'])
                            <td> {{$sub['sub_name']}}</td>
                            @endif
                        @endforeach
                        <td>
                            <a class="btn-sm btn-warning" href="/admin/product/{{$pro['id']}}/editproduct" role="button"> Edit </a>
                        </td>
                        <td><a class="btn-sm btn-danger" href="/admin/product/{{$pro['id']}}" role="button">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- table End -->
@endsection