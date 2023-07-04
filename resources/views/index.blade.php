@extends('app.index')

@section('content')

    @switch($route)

        @case('home')
            @include('app.home.carousel')
            @include('app.home.bannerCategory')
            @include('app.home.listProducts')
            @break
    
        @case('shop')
            @include('app.shop.shop')
            @break

        @case('product')
            @include('app.shop.productDetail')
            @break
        @case('sale')
            @include('app.shop.sale')
            @break
        @case('about-us')
            @break

        @case('cart')
            @include('app.cart.cart')
            @break

        @default
            @include('app.home.carousel')
            @include('app.home.bannerCategory')
            @include('app.home.listProducts')
            
    @endswitch
    


@endsection

