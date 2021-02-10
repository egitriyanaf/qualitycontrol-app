{{--
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INVENTORY | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    img{
      width: 80%;
      height: auto;
      margin-bottom: -40px;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <center><img src="{{ asset('file/logo.png') }}"></center>
    <br>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('login') }}">
    @csrf
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
</body>
</html>

--}}

{{--
<!-- GENTELELLA -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QC | PT. ANEKA SARIVITA</title>
    <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <h1>PT. ANEKA SARIVITA</h1>
              <div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" required value="{{ old('email') }}" autocomplete="email" autofocus/>
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required id="password" name="password" autocomplete="current-password"/>

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-secondary">Login</button>
                <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
                <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>


--}}

<!DOCTYPE html>
<html lang="en">
<head>
  <title>QC | PT. ANEKA SARIVITA</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('loginx/images/icons/favicon.ico') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/vendor/animate/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/vendor/css-hamburgers/hamburgers.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/vendor/animsition/css/animsition.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/vendor/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('loginx/css/main.css') }}">
</head>
<body style="background-color: #666666;">
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
          <center>
              <img src="{{ asset('file/logo.png') }}" style="width: 80%;height:auto;margin-top: -150px;">
          </center>
          <br>
          <span class="login100-form-title p-b-43">
            Login to continue
          </span>
          
          
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" required value="{{ old('email') }}" autocomplete="email" autofocus>

            <!-- <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" required value="{{ old('email') }}" autocomplete="email" autofocus/> -->
            <!-- @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror -->
                
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
          </div>
          @error('email')
            <!-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> -->
            <p>Email atau password tidak sesuai!</p>
          @enderror
          
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" autocomplete="current-password" required>

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
          </div>
          @error('password')
            <!-- <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> -->
            <p>Email atau password tidak sesuai!</p>
          @enderror
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>
        </form>

        <div class="login100-more" style="background-image: url('{{ asset("file/bg.jpeg") }}');">
        </div>
      </div>
    </div>
  </div>
  

  <script src="{{ asset('loginx/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('loginx/vendor/animsition/js/animsition.min.js') }}"></script>
  <script src="{{ asset('loginx/vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('loginx/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('loginx/vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('loginx/vendor/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ asset('loginx/vendor/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('loginx/vendor/countdowntime/countdowntime.js') }}"></script>
  <script src="{{ asset('loginx/js/main.js') }}"></script>

</body>
</html>