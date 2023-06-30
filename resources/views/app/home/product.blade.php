<div class=" mx-1 p-3 product-item position-relative position-relative-example">
        <a href="/shop/product={{$shoe->id_shoe}}">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="/images/{{$shoe->image_1}}" class="w-100 rounded" style="height: 250px;"/>
            </div>
            <center class="py-2">
                <p class="card-title py-3 fw-bold" style="color: #185137; font-size: 14px;">{{$shoe->name_shoe}}</p>
                <p class="card-text text-danger mb-1" style="font-size: 14px;">
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
                </p>
            </center>
        </a>
        @foreach($discounts as $discount)
        @if($discount['id_discount'] == $shoe->id_discount)
        @if($shoe->id_discount != 1)
        <p class="position-absolute py-1 text-white rounded text-center" style="background-color: #d9513f; font-size: 10px; width: 36px; top: 8%; left: 10%;">-{{$discount['discount_value']}}%</p>
        @endif 
        @endif 
        @endforeach
</div>
