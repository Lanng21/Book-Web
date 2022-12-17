<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @include('library.Login')

    <style>
        .input-group-append {
            border-radius: none;
            background-color: red;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card mt-5">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @include('admin.alert')
                <form action="{{ route('admin.users.store') }}" method="post">

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <span class="fas fa-lock"></span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block btn-md">SignIn</button>


                            <button class="btn btn-primary btn-block btn-md"><a cl style="color: #fff;"
                                    href="{{ route('showRegister') }}">Register</a></button>
                        </div>


                        <!-- /.col -->
                    </div>

                    <div class="row">
                        <a href="{{ route('GetPassword.moveViewer') }}">Quên mật khẩu ?</a>
                    </div>
                    @csrf
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</body>

</html>
