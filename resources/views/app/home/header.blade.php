<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-2 fixed-top">
    <div class="container">
        <a class="navbar-brand me-2" href="/home"><img src="{{ URL('images/logo.png') }}" height="45" width="100" alt="SHOES SHOP" loading="lazy"></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <form action="/search" method="POST" class="form-inline mr-auto w-100 navbar-search">
                    @csrf
                    <div class="d-flex" style="width:240px ;">
                        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search fa-sm"></i></button>
                    </div>
                </form>
            </li>
        </ul>

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtons" aria-controls="navbarButtons" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarButtons">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

            <div class="d-flex align-items-center float-right">
                <a href="/home" class=""><button type="button" class="btn btn-link px-3 me-2" style="color: #185137;">Home</button></a>
                <a href="/shop"><button type="button" class="btn btn-link px-3 me-2 " style="color: #185137;">Shop</button></a>
                <a href="/sale"><button type="button" class="btn btn-link px-3 me-2" style="color: #185137;">Sale</button></a>
                <a href="/home"><button type="button" class="btn btn-link px-3 me-2 " style="color: #185137;">About Us</button></a>
                <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="/cart" title="My Cart" data-mdb-toggle="tooltip" data-mdb-placement="bottom">
                    <i class="fas fa-shopping-cart text-secondary"></i>
                    <span class="badge rounded-pill badge-notification" style="background-color: #185137;" id="productCartCount">{{$lenCart}}</span>
                </a>

                @if (Session::get('Login'))
                <div class="dropdown">
                    <a class="text-reset dropdown-toggle hidden-arrow " href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"  style="color: #185137;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdownMenuLink">
                    <form method="POST" action="">
                            @csrf
                            <li><a class="dropdown-item" href="/account" style="color: #185137;">Account</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.logout')}}" style="color: #185137;">Sign Out</a></li>
                            @if (session()->get(key: 'check') == 1)
                            <li><a class="dropdown-item" href="/admin">Admin Page</a></li>
                            @endif
                        </form>
                    </ul>
                </div>

                @else
                <a class="btn btn-outline-success" href="{{ route('auth.login') }}">Sign In</a>
                &ensp;
                <a class="btn btn-success" href="{{ route('auth.register') }}">Sign Up</a>
                @endif

            </div>

        </div>
</nav>