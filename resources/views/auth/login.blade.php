<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login | Lesson Learned</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Favicon -->
		<link rel="icon" href="{{ asset('/assets/img/brand/favicon.ico') }}" type="image/x-icon"/>

        <!-- Bootstrap Css -->
        <link href="/user-login/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/user-login/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/user-login/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="/user-login/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="/" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="/user-login/assets/images/logo.png" alt=""  height="45">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="/" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="/user-login/assets/images/logo.png" alt=""  height="45">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="text-left" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" id="login">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" placeholder="enter username" value="{{ old('username') }}">
                                            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input name="password" type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                        </div>


                                    </form>

                                        <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>Go to <a href="/" class="fw-medium text-primary"> Home </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> RCLCD-IT. Coded with <i class="mdi mdi-heart text-danger"></i> by Jorem Belen</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="/user-login/assets/js/jquery/jquery.min.js"></script>
        <script src="/user-login/assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/user-login/assets/js/metismenu/metisMenu.min.js"></script>
        <script src="/user-login/assets/js/simplebar/simplebar.min.js"></script>
        <script src="/user-login/assets/js/node-waves/waves.min.js"></script>

        <!-- App js -->
        <script src="/user-login/assets/js/app.js"></script>
    </body>

</html>
