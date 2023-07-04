@extends('app.index')

@section('content')
<div class="card mb-3 shadow-5" style="margin-top: 70px;">
    <div class="card-body" style="margin-top:40px">
        <center>
            <h3 class="card-title" style="color: #185137;">SHOP</h3>
        </center>
    </div>
</div>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home" style="color: #185137;">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-xl-3">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            All Categories
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush">
                                @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="/shop/category={{$category['name_category']}}" class="text-dark">{{$category['name_category']}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            All Brands
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-mdb-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush">
                                @foreach($brands as $brand)
                                <li class="list-group-item">
                                    <a href="/shop/brand={{$brand['name_brand']}}" class="text-dark">{{$brand['name_brand']}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Price
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-mdb-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="/shop/price=0000000-1000000" class="text-dark">Under 1,000,000đ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/shop/price=1000000-2000000" class="text-dark">1,00,000 ~ 2,000,000đ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/shop/price=2000000-3000000" class="text-dark">2,000,000 ~ 3,000,000đ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/shop/price=3000000-5000000" class="text-dark">3,000,000 ~ 5,000,000đ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/shop/price=5000000-8000000" class="text-dark">5,000,000 ~ 8,000,000đ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-9">
            <div class="row mb-3">
                @foreach($shoes as $shoe)
                <div class="col-md-4">
                    @include('app.home.product')
                </div>
                @endforeach
                <div class="pagination justify-content-center">
                {{ $shoes->links() }}
            </div>

            </div>
            
        </div>



    </div>

</div>
@endsection
