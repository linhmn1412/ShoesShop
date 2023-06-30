<div class="container my-5">

    <!-- Show new arrivals  -->
    <div class="mb-3">
        <div class="card mb-3 shadow-1">
            <div class="card-body">
                <center>
                    <h3 class="" style="color: #185137;">New Arrivals</h3>
                </center>
            </div>
        </div>
        <div class="row mx-auto mt-4">
            @if($count = 1)@endif
            @foreach($newshoes as $shoe)
            @if($count <= 8) <div class="col-md-3">
                @include('app.home.product')
        </div>
        @if($count += 1)@endif
        @endif
        @endforeach
    </div>
    <center>
        <a href="/shop/newArrivals" class="btn btn-outline-dark my-3">See more</a>
    </center>
</div>


<!-- Show best seller  -->
<div class="mb-3">
    <div class="card mb-3 shadow-1">
        <div class="card-body">
            <center>
                <h3 class="" style="color: #185137;">Best Sellers</h3>
            </center>
        </div>
    </div>
    <div class="row mx-auto mt-4">
        @if($count = 1)@endif
        @foreach($bestsellers as $shoe)
        @if($count <= 8) <div class="col-md-3">
            @include('app.home.product')
    </div>

    @if($count += 1)@endif
    @endif
    @endforeach
</div>
<center>
    <a href="/shop/bestSellers" class="btn btn-outline-dark my-3">See more</a>
</center>
</div>

</div>