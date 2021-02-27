@extends('header')

@section('content')
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30 p-0">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="{{asset('/images/' . $Product -> pro_primary_img)}}">
                                <div class="wrap-pic-w pos-relative">
                                    <img style="height: 600px;" src="/images/{{$Product -> pro_primary_img}}" alt="IMG-PRODUCT">
                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('/images/' . $Product -> pro_primary_img)}}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @foreach($Product -> images as $image)
                            <div class="item-slick3" data-thumb="{{asset('/images/' . $image -> pro_images)}}">
                                <div class="wrap-pic-w pos-relative">
                                    <img style="height: 600px;" src="{{asset('/images/' . $image-> pro_images)}}" alt="IMG-PRODUCT">
                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('/images/' . $image-> pro_images)}}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{$Product->pro_name}}
                    </h4>
                    <span id="{{$Product->id}}" class="mtext-106 cl2 js-name-detail-price">
                        {{($Product->pro_price) - ($Product->pro_price * $Product->pro_discount)/100 }}
                    </span>
                    JOD
                    <p class="stext-102 cl3 p-t-23">
                        {{$Product->pro_desc}}
                    </p>

                    <div class="p-t-33">

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>
                                    <input id="qty" value="1" class="mtext-104 cl3 txt-center num-product js-name-detail-qty" type="number" name="num-product">
                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                                <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>
                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="sec-product bg0 p-t-20 p-b-50">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Related Products
            </h3>
        </div>

        <div class="tab01">


            <div class="tab-content p-t-50  p-l-50 p-r-50">

                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2 p-b-50 p-l-15 p-r-15">
                            @php $productsS = App\Product::where('subcategory_id' ,$Product->subcategory_id ) ->get()
                            @endphp

                            @foreach($productsS as $product)
                           

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15  ">

                                <div class="block2 ">
                                    <div class="block2-pic hov-img0 box">
                                        <img style="max-height:290px ; width:100%;min-height: 290px;"
                                            src="/images/{{$product->pro_primary_img}}" alt="IMG-PRODUCT">
                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>
                                    <div class=" d-flex justify-content-between p-t-14">
                                        <div class=" ">
                                            <a href="product-detail.html"
                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                {{$product->pro_name}}
                                            </a>

                                        </div>
                                        <div class=" d-flex flex-column p-t-3">
                                            <span style="text-decoration:line-through">
                                                {{sprintf("%.2f", $product->pro_price)}}JOD
                                            </span>
                                            <span>
                                                {{sprintf("%.2f", $product->pro_price) - sprintf("%.2f", $product->pro_price) * $product-> pro_discount /100 }}JOD
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      
    </div>
   
</section>
@endsection