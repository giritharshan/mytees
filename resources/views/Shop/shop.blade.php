<?


?>

@extends('frntLayout.layout')

@if(Session::has('success'))
    <script>

        alert("{{Session::get('success')}}");

    </script>
    <!--<div class ="col-sm-6.col-md-4.col-md-offset-4.col-sm-offset-3">
        <div id="charge-message" class="alert alert-success">

    </div>
    </div>-->
@endif
@if(Session::has('empty'))
    <script>

        alert("{{Session::get('empty')}}");

    </script>
    @endif
@section('products')
    <!-- Product -->
    @foreach($item as $items)

    <div class="col-xl-4 col-md-6">
        <div class="product">
            <div class="product_image"><a href="{{'/ch2/search/'.$items->id}}"><img src="{{asset('shop/images/product_1.jpg')}}" alt="" ></a></div>
            <div class="product_content">
                <div class="product_info d-flex flex-row     align-items-start justify-content-start">
                    <div>
                        <div>
                            <div class="product_name"><a href="{{'/ch2/search/'.$items->id}}">{{$items->desc}}</a></div>
                            <div class="product_category">In <a href="{{'/ch2/search/'.$items->id}}">{{$items->cat}}</a></div>
                        </div>
                    </div>
                    <div class="ml-auto text-right">
                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_price text-right">{{$items->price}}<span>.99</span></div>
                    </div>
                </div>
                <div class="product_buttons">
                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                            <div><div><img src="{{asset('shop/images/heart_2.svg')}}" class="svg" alt=""><div>+</div></div></div>
                        </div>
                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                            <div><div><img src="{{asset('shop/images/cart.svg')}}" class="svg" alt=""><div>+</div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

