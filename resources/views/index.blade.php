@extends('header')

@section('content')
<section class="section-slide ">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1  p-l-90" style="background-image: url(images/slide-01.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                camping Collection 2010
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                NEW SEASON
                            </h2>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-slick1  p-l-90" style="background-image: url(images/slide-02.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                Diving Octopus Equipment
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                Bontrager & NRS
                            </h2>
                        </div>
                        <div class="layer-slick1  animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-slick1  p-l-90" style="background-image: url(images/slide-03.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                Climbing Collection 2021
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                New arrivals
                            </h2>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of slider -->

<div class="sec-banner bg0 p-t-80 p-b-15 p-l-50 p-r-50">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">

                <div class="block1 wrap-pic-w">
                    <img style="height:225px" src="images/{{$category->cat_img}}" alt="IMG-BANNER">
                    <a href="subcategories/{{$category -> id}}"
                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-10 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8 text-light">
                                {{$category->cat_name}}
                            </span>
                            <span class="block1-info stext-102 trans-04 text-light">
                                Spring 2018
                            </span>
                        </div>
                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Shop Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<section class="sec-product bg0 p-t-20 p-b-50">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Store Overview
            </h3>
        </div>

        <div class="tab01">


            <div class="tab-content p-t-50  p-l-50 p-r-50">

                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2 p-b-50 p-l-15 p-r-15">
                            @foreach($products as $product)
                            @if($product->pro_discount!=0)

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15  ">

                                <div class="block2 ">
                                    <div class="block2-pic hov-img0 box">
                                        <img style="max-height:290px ; width:100%;min-height: 290px;"
                                            src="images/{{$product->pro_primary_img}}" alt="IMG-PRODUCT">
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
                            @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- about me section -->
@section('main')
<section class="bg0 p-t-25 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Our Story
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim,
                        non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed
                        tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue.
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                        egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus
                        ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue.
                        Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis
                        diam faucibus et. Morbi a tempor elit.
                    </p>

                </div>
            </div>
            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="images/scott-goodwill-y8Ngwq34_Ak-unsplash.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Our Mission
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed
                        consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                        ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida.
                        Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac
                        velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in,
                        porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque
                        tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris
                        auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget
                        elementum libero iaculis.
                    </p>

                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="images/sebastian-pena-lambarri-7i5HMCGupVw-unsplash.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


