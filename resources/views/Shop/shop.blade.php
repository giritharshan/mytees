@extends('frntLayout.layout')


@section('products')
    <!-- Product -->
    @foreach($item as $items)

    <div class="col-xl-4 col-md-6">
        <div class="product">
            <div class="product_image"><img src="{{asset('shop/images/product_1.jpg')}}" alt=""></div>
            <div class="product_content">
                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                    <div>
                        <div>
                            <div class="product_name"><a href="product.html">{{$items->desc}}</a></div>
                            <div class="product_category">In <a href="category.html">{{$items->cat}}</a></div>
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

