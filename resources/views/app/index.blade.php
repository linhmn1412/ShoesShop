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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


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

    @include('app.home.header')

    @yield('content')

    @include('app.home.footer')

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