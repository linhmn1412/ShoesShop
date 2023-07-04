@extends('app.index')

@section('content')

<div class="container mb-3 " style=" margin-top: 70px;">

    <nav aria-label="breadcrumb">
        <div class="row">
            <div class="col-md-7 ">
                <ul class="breadcrumb my-0 py-3">
                    <li class="breadcrumb-item"><a href="/home" style="color: #185137;">Home</a></li>
                    <li class="breadcrumb-item"><a href="/shop" style="color: #185137;">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $shoe['name_shoe']  }}</li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="row">
        <div class="card mb-2">
            <div class="row">
                <div class="col-md p-5">
                    <img src="/images/{{$shoe->image_1}}" alt="..." class="img-fluid rounded-start d-block w-100 rounded" />
                    <div class="row py-5">
                        <div class="col  ripple "><img src="/images/{{$shoe->image_1}}" alt="..." class="img-fluid rounded-start rounded" /></div>
                        <div class="col  ripple mx-2"><img src="/images/{{$shoe->image_2}}" alt="..." class="img-fluid rounded-start rounded" /></div>
                        <div class="col ripple "><img src="/images/{{$shoe->image_3}}" alt="..." class="img-fluid rounded-start rounded" /></div>
                    </div>
                </div>
                <div class="col-md position-relative">
                    <div class="card-body mt-5 py-5">
                        <div class="float-end ">


                            <small class="text-muted float-end">({{ $countFB['count_fb'] }} Rated)</small>
                            @if($countFB['count_fb'] !== 0)
                            <div id="avgRated" class="float-end text-info"></div>
                            <script>
                                $(function() {
                                    $("#avgRated").rateYo({
                                        starWidth: "20px",
                                        rating: {{$countFB['avgRated']}},
                                        readOnly: true,
                                    })
                                });
                            </script>
                            @endif
                        </div>

                        <h3 class="card-title mb-3" style="color: #185137;">{{ $shoe['name_shoe'] }}</h3>

                        <h5 class="card-text text-danger mb-3 ">
                            @if($ds = 0)@endif
                            @foreach($discounts as $discount)
                            @if($discount['id_discount'] == $shoe->id_discount)
                            @if($ds = sprintf('%d', $shoe->price * 0.01 *$discount['discount_value']))@endif
                            @endif
                            @endforeach
                            <b>{{number_format($shoe->price - $ds, 0, ',', ',')}}đ</b>
                            @if($shoe->id_discount != 1)
                            <del style="color: #7e7e7e; font-weight: 500;">{{number_format($shoe->price, 0, ',', ',')}}đ</del>
                            @endif
                        </h5>
                        <p class="mb-2" style="color: #185137;">Choose size:</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-link fs-6" style="color: #185137;" data-mdb-ripple-color="dark">36</button>
                            <button type="button" class="btn btn-link fs-6" style="color: #185137;" data-mdb-ripple-color="dark">37</button>
                            <button type="button" class="btn btn-link fs-6" style="color: #185137;" data-mdb-ripple-color="dark">38</button>
                            <button type="button" class="btn btn-link fs-6" style="color: #185137;" data-mdb-ripple-color="dark">39</button>
                            <button type="button" class="btn btn-link fs-6" style="color: #185137;" data-mdb-ripple-color="dark">40</button>
                        </div>
                        <br>


                        <p class="card-text mb-3">
                            <small class="text-muted"></small>
                        </p>
                        <div class="d-grid gap-2 mb-3">
                            <a href="/shop/product={{$shoe['id_shoe']}}/addToCart" class="btn btn-primary fs-6 d-flex justify-content-between align-items-center" type="button" data-url="{{ route('addToCart', ['id' => $shoe['id_shoe']]) }}" style="background-color: #185137;">
                                <span>Add To Cart</span>
                                <i class="fas fa-arrow-right-long"></i>
                            </a>
                            <a href="#reviewProduct" class="btn btn-primary bg-white fs-6 text-start" style="color: #185137;" type="button">Review product</a>
                        </div>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed fw-bold" style="color: #185137;" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Description
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @if($shoe->description != null)
                                        <p class="p-3">{{$shoe->description}}</p>
                                        @else
                                        <p class="p-3">No description!</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed fw-bold" style="color: #185137;" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Detail product
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p><i class="fas fa-arrow-right-long"></i> <b>ID: </b>{{ $shoe['id_shoe'] }}</p>
                                        <p><i class="fas fa-arrow-right-long"></i> <b>Product Name: </b>{{ $shoe['name_shoe'] }}</p>
                                        <p><i class="fas fa-arrow-right-long"></i> <b>Category: </b>
                                            @foreach($categories as $category)
                                            @if($category['id_category']==$shoe->id_category)
                                            {{$category['name_category']}}
                                            @endif
                                            @endforeach
                                        </p>
                                        <p><i class="fas fa-arrow-right-long"></i> <b>Brand: </b>
                                            @foreach($brands as $brand)
                                            @if($brand['id_brand']==$shoe->id_brand)
                                            {{$brand['name_brand']}}
                                            @endif
                                            @endforeach
                                        </p>
                                        <p><i class="fas fa-arrow-right-long"></i> <b>Price </b>{{ number_format($shoe['price']) }}đ</p>
                                        <p><i class="fas fa-arrow-right-long"></i> <b>Stock: </b>{{ $shoe['quantity_stock'] }}</p>
                                        <p><i class="fas fa-arrow-right-long"></i> <b>Discount: </b>
                                            @foreach($discounts as $discount)
                                            @if($shoe->id_discount == $discount->id_discount)
                                            {{$discount->name_discount}}
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed fw-bold" style="color: #185137;" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Exchange policy
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p class="py-3 px-5">1. Contact customer service via hotline 0123.456.789 or direct message to instagram account @Shoes.Shop for detailed instructions.
                                            <br>
                                            2. Note: Please do not arbitrarily return the product without contacting the customer service department, Bear is not responsible for the loss of goods.
                                            <br>
                                            Thank you for choosing ShoesShop, Bear is happy to answer and support you!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    @foreach($discounts as $discount)
                    @if($discount['id_discount'] == $shoe->id_discount)
                    @if($shoe->id_discount != 1)
                    <p class="position-absolute py-1 text-white rounded text-center" style="background-color: #d9513f; font-size: 10px; width: 36px; top: 3rem; left: 20px">
                        -{{$discount['discount_value']}}%</p>
                    @endif
                    @endif
                    @endforeach
                </div>
            </div>
            @php
            $check = 0;
            @endphp
            <div class="row mb-4">

                <div class="col-md" id="reviewProduct">
                    <h5 class="card-title mb-4" style="color: #185137;">Feedback</h5>
                    @if($feedbacks != [])
                    @foreach ($feedbacks as $feedback)
                    <div class="row border m-1">
                        <div class="col-1 p-0">
                            <center> <img class="w-100" height="50px" src="/images/user.jpg"></center>
                        </div>
                        <div class="col-10">
                            <p class="mb-0 fw-bold" style="color: #185137;">{{ $feedback->username }}</p>
                            <div id="rateYo{{$feedback->id_feedback}}" class="p-0"></div>
                            <script>
                                $(function() {
                                    $("#rateYo{{$feedback->id_feedback}}").rateYo({
                                        rating: {{$feedback->rated}},
                                        starWidth: "15px",
                                        readOnly: true
                                    });
                                });
                            </script>
                            <p class="m-0" style="font-size: 12px;">{{ $feedback->updated_at }}</p>
                            <p class="my-2">{{ $feedback->comment }}</p>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <small class="text-dark px-2">No feedback!</small>
                    @endif

                    @foreach($allShoes_user as $item)
                    @if($item->id_shoe == $shoe->id_shoe)
                    @php $check= 1; @endphp
                    @endif
                    @endforeach

                    <div class="pagination justify-content-end">
                        <center>{{ $feedbacks->links() }}</center>
                    </div>
                </div>
                @if ($check == 1)
                <div class="col-md">

                    <form action="/shop/product={{ $shoe['id_shoe'] }}/feedback" method="POST">
                        @csrf
                        <br>
                        <h5 class="float-start">Review Product</h5>
                        <div id="rateYo" class=" float-end text-info"></div><br><br>
                        <input type="hidden" class="form-control" name="rated" id="rated" readonly>
                        <script>
                            $(function() {
                                $("#rateYo").rateYo({
                                    starWidth: "30px",
                                    normalFill: "#A0A0A0",
                                    onChange: function(rating, rateYoInstance) {
                                        $("#rated").val(rating);
                                    }
                                });

                            });
                        </script>
                        <input type="hidden" class="form-control" name="id_user" value="{{ $data['id_user'] }}">
                        <input type="hidden" class="form-control" name="id_shoe" value="{{ $shoe['id_shoe'] }}">

                        <div class="form-outline mb-4">
                            <input type="input" class="form-control" name="username" required value="{{ $data['username'] }}" readonly />
                            <label class="form-label">Name</label>
                        </div>
                        <div class="form-outline">
                            <textarea type="text" class="form-control" name="comment" rows="4"></textarea>
                            <label class="form-label">Comment</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info float-end">Send</button>
                    </form>

                </div>
                @endif


                @if ($check == 0)
                <div class="col-md">
                    <p class="text-dark bg-success p-2 text-dark bg-opacity-25">Buy to rate it!</p>
                    <br>
                </div>
                @endif

            </div>
        </div>
    </div>

    <br>



</div>

<div class="container mb-3">
    <div class="card mb-3 shadow-1">
        <div class="card-body">
            <center>
                <h3 class="" style="color: #185137;">You May Also Like</h3>
            </center>
        </div>
    </div>
    <div class="row mx-auto mt-4">
        @if($count = 1)@endif
        @foreach($similarShoes as $shoe)
        @if($count <= 4) <div class="col-md-3">
            @include('app.home.product')
    </div>

    @if($count += 1)@endif
    @endif
    @endforeach

</div>

@endsection