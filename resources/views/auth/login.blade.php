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
                                <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">LOGIN</p>
                                <form method="POST" action="{{ route('auth.checkLogin') }}">
                                @csrf
                                    <br>
                                    @if (Session::get('Fail'))
                                        <p class="text-danger">{{ Session::get('Fail') }}</p>
                                @endif
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form2Example1" class="form-control" name="username" value="{{ old('username') }}" />
                                        <label class="form-label" for="form2Example1">Email or Username</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example2" class="form-control" name="password" value="{{ old('password') }}"/>
                                        <label class="form-label" for="form2Example2">Password</label>
                                    </div>

                                    <!-- 2 column grid layout for inline styling -->
                                    <div class="row mb-4">
                                        <div class="col d-flex justify-content-center">
                                            <!-- Checkbox -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                                                <label class="form-check-label" for="form2Example34"> Remember me </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <!-- Simple link -->
                                            <a href="#!">Forgot password?</a>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>Not a member? <a href="{{ route('auth.register') }}">Register</a></p>
                                        <p>or sign up with:</p>
                                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>

                                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                                            <i class="fab fa-google"></i>
                                        </button>

                                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                                            <i class="fab fa-twitter"></i>
                                        </button>

                                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                                            <i class="fab fa-github"></i>
                                        </button>
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