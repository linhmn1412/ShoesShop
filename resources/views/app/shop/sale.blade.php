<div style="margin-top: 70px;"><img src="/images/bannersale.jpg" class="w-100" alt=""></div>
<div class="container my-4">
    <!-- Tabs navs -->
    <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1" aria-selected="true">Sale 30% ++</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab" aria-controls="ex3-tabs-2" aria-selected="false">Sale 20% ++</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab" aria-controls="ex3-tabs-3" aria-selected="false">Sale 10%</a>
        </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="ex2-content">
        <div class="tab-pane fade show active " id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <div class="row mb-3">
                @foreach($shoes30 as $shoe)
                <div class="col-md-3">
                    @include('app.home.product')
                </div>
                @endforeach
            </div>
            </div>
            <div class="tab-pane fade " id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                <div class="row mb-3">
                    @foreach($shoes20 as $shoe)
                    <div class="col-md-3">
                        @include('app.home.product')
                    </div>
                    @endforeach
                </div>
            </div>
                <div class="tab-pane fade row" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                    <div class="row mb-3">
                        @foreach($shoes10 as $shoe)
                        <div class="col-md-3">
                            @include('app.home.product')
                        </div>
                        @endforeach
                    </div>
                    <!-- Tabs content -->
                </div>
        
    </div>
</div>