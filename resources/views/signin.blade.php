<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    @include('modules.head')
</head>
<body>
    <section class="min-vh-100 gradient-custom d-flex align-items-center">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="form-box card text-dark animate__animated animate__fadeInDown">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Sign In</h2>
                                <form action="/signin" method="post">
                                    @csrf
                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Email</label>
                                        <input type="text" name="email" class="form-control form-control">
                                    </div>
                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Password</label>
                                        <input type="password" name="password" class="form-control form-control">
                                    </div>
                                    @if ($errors->any() || isset($loginError))
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Check the data entered</strong>
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <p class="myError">- {{$error}}</p>
                                            @endforeach
                                        @endif
                                        @if(isset($loginError))
                                            <p class="myError">- {{$loginError}}</p>
                                        @endif
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                    @endif
                                    <p class="small mb-5 pb-lg-2"><a class="text-dark" href="#!">Forgot password?</a></p>
                                    <button class="name-button bg-dark btn btn-outline-light btn-lg px-5" type="submit">Sign In</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="/signup" class="text-dark fw-bold">Sign up!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('modules.footer')
</body>
</html>
