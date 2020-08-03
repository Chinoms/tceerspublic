<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CEERS | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
            <a href="#!"><b><img src="imgs/tceerslogo.png"></b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg" id="loginInfo"></p>

                <form onSubmit = "loginUser()">
                    <div class="form-group has-feedback">
                        <input type="text" id="email" name="email" class="form-control" placeholder="User ID" required>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                       
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <input type="submit" id="loginbtn" name="submit" class="btn btn-primary btn-block btn-flat" value="Login">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->
                <a href="signup.php">Don't have an account? Sign up now!</a> <br>
                <a href="#">Forgot your password?</a> <br>
                

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="bootstrap/js/custom.js"></script>
       
    </body>
</html>
