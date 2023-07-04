@extends('app.index')

@section('content')
<div class="card mb-3 shadow-5" style="margin-top: 70px;">
    <div class="card-body" style="margin-top:40px">
        <center>
            <h3 class="card-title" style="color: #185137;">MY CART</h3>
        </center>
    </div>
</div>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home" style="color: #185137;">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
    <div class="table-responsive">
        <!-- table-hover -->
        <table class="table align-middle text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="color: #185137;">
                    <th scope="col"></th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Change</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalProduct = 0;
                $totalOrder = 0;
                @endphp
                @if($cart == [])
                <tr>
                    <td colspan="8" class=" fw-bold">You don't have any favorite products yet!</td>
                </tr>
                @else
                @foreach($cart as $id=>$cart_item)
                <tr>
                    <td>
                        <form id="formCheckout" action="/cart/checkout" method="POST">
                            @csrf
                            <div class="form-check info">
                                <input class="form-check-input" type="checkbox" value="{{$id}}" form="formCheckout" name="check-cart[]" checked />
                            </div>
                        </form>
                    </td>
                    <td scope="row">
                        <img src="/images/{{$cart_item['image_1']}}" alt="..." class="img-fluid rounded-start" width="80px" height="80px" />
                    </td>
                    <td>{{$cart_item['name_shoe']}}</td>
                    <td>{{number_format($cart_item['price'])}}đ</td>
                    <td>{{$cart_item['discount_value']}}%</td>

                    <form action="/cart/update" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$id}}" />

                        <td>
                            <div class="d-flex">
                                <div class="btn btn-info px-3 mr-1" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" style="margin-right:2px">
                                    <i class="fas fa-minus"></i>
                                </div>

                                <div class="form-outline " style="width:50px">
                                    <input id="form1" min="1" name="quantity" value="{{$cart_item['quantity']}}" type="number" autocomplete="off" class="form-control text-center" />
                                    <style>
                                        input[type="number"]::-webkit-inner-spin-button,
                                        input[type="number"]::-webkit-outer-spin-button {
                                            -webkit-appearance: none;
                                            margin: 0;
                                        }
                                    </style>
                                </div>&nbsp;

                                <div class="btn btn-info px-3 mr-1" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </td>
                        <td><b>{{number_format($totalProduct= sprintf('%d', ($cart_item['quantity'] * ( $cart_item['price']-$cart_item['price'] * $cart_item['discount_value'] * 0.01) )))}}đ<b>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-info"><i class="fas fa-pen-to-square"></i></button>

                            <a href="/cart/delete/id={{$id}}" onclick="return confirm('Do you want to remove a product from your cart?');" type="button" class="btn btn-danger"><i class="fas fa-trash-can"></i></a>
                        </td>
                    </form>
                </tr>
                @php
                $totalOrder += $totalProduct;
                @endphp
                @endforeach
                @endif

            </tbody>
        </table>
    </div>
    <center>
        <a href="/shop" class="btn btn-block text-white" style="background-color: #185137; width: 300px;">Buy more products</a>
    </center>
    <div class="card my-3">
        <div class="card-header">
            <div class="float-start">
                <p class="card-title fw-bold" style="margin-top: 20px; color: #185137;">Total: <span class="fs-4">{{number_format($totalOrder)}}đ</span>
                </p>
            </div>
            <div class="float-end">
                <button type="submit" class="btn text-white " style="margin: 15px; background-color: #185137;" form="formCheckout">Check Out</button>
            </div>
        </div>
    </div>

</div>
@endsection