<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update password</title>
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
        <div class="login-logo">
            <a href="">Login Admin</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @include('admin.alert')
                <form action="" method="post">

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="passwordConfirm" class="form-control" placeholder="Password Confirm">
                        <div class="input-group-append">
                            <span class="fas fa-lock"></span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block btn-md">Đặt lại mật khẩu</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>