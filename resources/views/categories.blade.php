@extends('header')
@section('content')

    <div class="row col-12 align-items-start p-5">
        <div class="d-inline-flex flex-w flex-sb-m p-b-52 col-3">
            <div class="flex-column flex-w flex-l-m filter-tope-group m-tb-10">
            <div style="background: #5b6d5b;" class=" col-12 d-flex text-left">
                <button class="stext-106 my-3 cl6 hov1 text-light how-active1" data-filter="*">
                    All Products
                </button>
            </div>
                @foreach($subcat as $subcategory)
                <div style="background: #5b6d5b;" class=" col-12 d-flex text-left">

                    <button  class="stext-106 my-3 cl6 hov1 text-light " data-filter=".{{$subcategory->id}}">
                        {{$subcategory->sub_name}}
                    </button>
                </div>
                @endforeach
            </div>

        </div>
        <div st class="isotope-flex d-inline-flex align-items-center justify-content-between row col-9">

            @foreach ($subcat as $sub)
            @foreach($sub -> products -> all() as $product)

            <div class="col-2 m-0 isotope-item my-2 {{$product->subcategory_id}}">
                <div class="block2">

                    <div class="block2-pic hov-img0">
                        <img style="height: 250px;" src="{{'/images/' . $product->pro_primary_img}}" alt="IMG-PRODUCT">
                        <a href="{{'/singelproduct/'. $product->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 d-flex justify-content-between ">
                            <a href="{{'/singelproduct/'. $product->id}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product->pro_name}}
                            </a>
                            <a href="{{'/singelproduct/'. $product->id}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{($product->pro_price) - ($product->pro_price * $product->pro_discount)/100 }} JOD
                            </a>



                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            @endforeach

        </div>

    </div>

@endsection