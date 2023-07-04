<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('images/logo.png') }}">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <title>SHOES SHOP - Sign in</title>
</head>

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">

                            <div class="col-4 order-2 order-lg-2">
                                <p class="text-center text-success h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">SIGN UP</p>
                                <form method="POST" action="{{ route('auth.saveRegister') }}">
                                    @csrf
                                    <div class="d-flex flex-row align-items-center mt-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="fullname" name="fullname" required autofocus autocomplete="fullname" class="form-control" />
                                            <label class="form-label" for="fullname">Full name:</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mt-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="email" type="email" name="email" required />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                    </div>
                                    <p class="text-danger">@error('email')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                    <div class="d-flex flex-row align-items-center mt-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="phone_number" name="phone_number" required autofocus autocomplete="phone_number" class="form-control" />
                                            <label class="form-label" for="phone_number">Phone</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mt-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="username" name="username" required autofocus autocomplete="username" class="form-control" />
                                            <label class="form-label" for="username">Username</label>
                                        </div>
                                    </div>
                                    <p class="text-danger">@error('username')
                                        {{ $message }}
                                        @enderror
                                    </p>

                                    <div class="d-flex flex-row align-items-center mt-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="password" type="password" name="password" required autocomplete="new-password" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                    <p class="text-danger">@error('password')
                                        {{ $message }}
                                        @enderror
                                    </p>

                                    <div class="d-flex flex-row align-items-center mt-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            <label class="form-label" for="password_confirmation">Confirm password</label>
                                        </div>
                                    </div>
                                    <p class="text-danger">@error('password_confirmation')
                                        {{ $message }}
                                        @enderror
                                    </p>
                                    <input type="hidden" class="form-control" name="id_role" value=2 />

                                    <div class="d-flex justify-content-center mx mt-3 mb-lg-4">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Sign Up</button>
                                    </div>
                                    <div class="text-center">
                                        <p>Already have an account? <a href="{{ route('auth.login') }}">Sign In</a></p>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

</html>