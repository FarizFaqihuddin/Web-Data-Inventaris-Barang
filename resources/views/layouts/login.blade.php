
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{url('ela-admin/images/icon.png')}}">
    <title>SDT - Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/ela-admin/css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/ela-admin/css/helper.css')}}" rel="stylesheet">
    <link href="{{url('/ela-admin/css/style.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h2><img style="width: 60%; display: block; margin: auto; margin-bottom: 30px!important;" class="img-responsive" src="{{url('ela-admin/images/logo.png')}}"/></h2>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                   {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                      <!-- <label for="email">Username</label> -->

                                          <input id="email" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>

                                          @if ($errors->has('username'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('username') }}</strong>
                                              </span>
                                          @endif
                                  </div>

                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <!-- <label for="password">Password</label> -->

                                          <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                          @if ($errors->has('password'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                  </div>
                                  
                                    <div class="form-group">
                                      <div class="col-md-offset-4">
                                          <div class="checkbox">
                                              <label>
                                                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                              </label>
                                          </div>
                                      </div>
                                  </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style="margin-top: 0!important;">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="{{url('ela-admin/js/lib/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('ela-admin/js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{url('ela-admin/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('ela-admin/js/jquery.slimscroll.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{url('ela-admin/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{url('ela-admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{url('ela-admin/js/custom.min.js')}}"></script>

</body>

</html>