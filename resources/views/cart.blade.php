@extends('header')

@section('content')
@if((!empty(Session::get('cart.teams'))))


<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
<a href="index-2.html" class="stext-109 cl8 hov-cl1 trans-04">
Home
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>
<span class="stext-109 cl4">
Shoping Cart
</span>
</div>
</div>

<form class="bg0 p-t-75 p-b-85">
<div class="container">
<div class="row">
<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
<div class="m-l-25 m-r--38 m-lr-0-xl">
<div class="wrap-table-shopping-cart">


<table class="table-shopping-cart">
<tr class="table_head">
<th class="column-1">Product</th>
<th class="column-2"></th>
<th class="column-3">Price</th>
<th class="column-4 text-center">Quantity</th>
<th class="column-5">Total</th>
</tr>



@foreach(Session::get('cart.teams') as $k => $product )
<tr id="{{$k}}" class="table_row">
<td class="column-1">
<div onclick="removeFromCart({{($product -> pro_price - ($product -> pro_price * $product -> pro_discount/100)) * $product -> qty}} , {{$k}});" class="how-itemcart1">
 

    <img  src="{{'/images/' . $product -> pro_primary_img}}" alt="IMG">

</div>
</td>
<td class="column-2">{{$product -> pro_name}}</td>
<td  class="column-3"> <span id="cart_price">{{($product -> pro_price - ($product -> pro_price * $product -> pro_discount/100))}}</span>  JOD</td>
<td class="column-4 text-center">


{{$product->qty}}


</td>
<td class="column-5"> {{ $tot[] = ($product -> pro_price - ($product -> pro_price * $product -> pro_discount/100)) * $product -> qty}} JOD</td>
</tr>


@endforeach


</table>




</div>

</div>
</div>
<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
<h4 class="mtext-109 cl2 p-b-30">
Cart Totals
</h4>
<div class="flex-w flex-t bor12 p-b-13">
<div class="size-208">

</div>

</div>
<div class="flex-w flex-t bor12 p-t-15 p-b-30">
<div class="size-208 w-full-ssm">
<span class="stext-110 cl2">
Shipping:
</span>
</div>
<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
<p class="stext-111 cl6 p-t-2">
There are no shipping methods available. Please double check your address, or contact us if you need any help.
</p>
<div class="p-t-15">

<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">

</div>
</div>
</div>
</div>
<div class="flex-w flex-t p-t-27 p-b-33">
<div class="size-208">
<span class="mtext-101 cl2">
Total:
</span>
</div>
<div class="size-209">
<span id="cart_total_price_of_shipping" class="mtext-110 cl2">
    
{{array_sum($tot)}}
</span>
JOD
</div>
</div>
<a href="/checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
Proceed to Checkout
</a>
</div>
</div>
</div>
</div>
</form>
@else
<div class="d-flex flex-column justify-content-center align-items-center">
<img height="500px" src="/images/empty.png" alt="">
    <h1>Cart is empty</h1>
</div>
@endif
@endsection