<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('images/logo.png') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>SHOES SHOP</title>
    <style>
        #backTop:hover {
            color: #185137;
            background-color: #ababab;
        }

        .product-item:hover {
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.12);
        }
    </style>
</head>

<body>

    <a href="https://www.facebook.com/" title="Gọi ngay" class=" position-fixed  end-0 " style="bottom: 28%; z-index: 100;">
        <img src="{{ URL('images/call.png') }}" alt="" style="width: 60px;">
    </a>
    <a href="https://zalo.me/" title="Zalo" class="position-fixed  end-0  " style="bottom: 18%; z-index: 100;">
        <img src="{{ URL('images/zalo.png') }}" alt="" style="width: 60px;">
    </a>
    <a href="https://www.messenger.com/" title="Messenger" class=" position-fixed  end-0 " style="bottom: 8%; z-index: 100;">
        <img src="{{ URL('images/messenger.png') }}" alt="" style="width: 60px;">
    </a>

    <button onclick="backtopFunction()" id="backTop" title="Back top" class="px-3 py-2 position-fixed bottom-0 end-0 rounded-circle btn btn-dark " style="display: none; z-index: 100;">
        <i class="fas fa-angles-up"></i>
    </button>

    <div class="container mt-4">
        <div class="card mb-3 shadow-5">
            <div class="card-body" style="margin-top:40px">
                <center>
                    <h3 class="card-title" style="color: #185137;">CHECK OUT</h3>
                </center>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home" style="color: #185137;">Home</a></li>
                <li class="breadcrumb-item"><a href="/cart" style="color: #185137;">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Check Out</li>
            </ol>
        </nav>


        @php
        $total = 0;
        @endphp

        @foreach ($checkout as $checkout_item)
        @php
        $total += $checkout_item['quantity'] * ($checkout_item['price'] - $checkout_item['price'] * $checkout_item['discount_value'] * 0.01);
        @endphp
        @endforeach

        <div class="row">
            <div class="col-7">
                <div class="card mb-3">
                    <form id="formOrder" action="/checkout/bill" method="POST">
                        @csrf
                        <div class="card-header">
                            <h5 class="card-title" style="margin-top: 10px; color: #185137;">DELIVERY INFORMATION:</h5>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="payment">Payment:</label>
                                <select name="payment" id="payment" class="form-control">
                                    <option value="Payment on delivery">Payment on delivery</option>
                                    <option value="Momo wallet"> Momo wallet</option>
                                    <option value="Vietcombank"> Vietcombank</option>
                                    <option value="Vietinbank"> Vietinbank</option>
                                    <option value="Credit"> Credit</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-outline">
                                <input type="text" class="form-control" name="fullname" value="{{ $data['fullname'] }}" required />
                                <label class="form-label">Recipient's name:</label>
                            </div>
                            <br>
                            <div class="form-outline">
                                <input type="text" class="form-control" name="phone_number" value="{{ $data['phone_number'] }}" required />
                                <label class="form-label">Phone</label>
                            </div>
                            <br>

                            <div class="form-outline">
                                <input type="text" class="form-control" name="address" required />
                                <label class="form-label">Address</label>
                            </div>
                            <br>

                            <div class="form-outline mb-3">
                                <textarea type="text" class="form-control" name="note"></textarea>
                                <label class="form-label">Note</label>
                            </div>
                            <input type="hidden" class="form-control" name="id_user" value="{{ $data->id_user }}" />
                            <input type="hidden" class="form-control" name="total" value="{{ $total }}" />
                            <input type="hidden" class="form-control" name="status" value="unconfirmed" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title" style="margin-top: 10px">Your Bill:</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkout as $checkout_item)
                                <tr>
                                    <td scope="row">{{ $checkout_item['name_shoe'] }}</td>
                                    <td>{{ number_format($cur_price = sprintf('%d', $checkout_item['price'] - $checkout_item['price'] * $checkout_item['discount_value'] * 0.01)) }}đ</td>
                                    <td>{{ $checkout_item['quantity'] }}</td>
                                    <td>{{ number_format( $checkout_item['quantity'] * $cur_price) }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="fw-bold mx-2">
                            <span style="font-size: 12px;">Sub Total:</span>
                            <span class="float-end">{{ number_format($total) }}đ</span>
                        </div>
                        <div class="fw-bold mx-2">
                            <span style="font-size: 12px;">Delivery Fee:</span>
                            <span class="float-end">20,000đ</span>
                        </div>

                        <div class="fw-bold mx-2 mb-3">
                            <span style="font-size: 12px; ">Invoice Total: </span>
                            <span class="float-end">{{ number_format($total + 20000) }}đ</span>
                        </div>

                        <div>
                        <button type="submit" class="btn btn-block text-white" style="background-color: #185137;" form= "formOrder">Order Now</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const backTop = document.getElementById("backTop");
        window.onscroll = function() {
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                backTop.style.display = "block";
            } else {
                backTop.style.display = "none";
            }
        };

        function backtopFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

</body>

</html>