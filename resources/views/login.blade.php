<!DOCTYPE html>

<html class="backend">
  <!-- START Head -->
  <head>
    <!-- START META SECTION -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MoPen</title>

    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/plugins/animatecss/css/animate.css">
    <link rel="stylesheet" href="/stylesheet/layouts/layout.css">
    <link rel="stylesheet" href="/stylesheet/uielement.css">

    <script type="text/javascript" src="../../plugins/modernizr/js/modernizr.js"></script>

  </head>

  <body data-baseurl="../../">
    <!-- START Template Main -->
    <section id="main" role="main">
      <!-- START Template Container -->
      <div class="container">
        <!-- START row -->
        <div class="row">
          <div class="col-lg-4 col-lg-offset-4">
            <!-- Brand -->
            <div class="text-center" style="margin-bottom:40px;">
              <span class=""></span>
              <span class=""></span>
              <h5 class="semibold text-muted mt-5">Login to your account.</h5>
            </div>
            <!--/ Brand -->
            <!-- Social button -->
            <!--
            <ul class="list-table">
              <li>
                <button type="button" class="btn btn-block btn-facebook">Connect with
                  <i class="ico-facebook2 ml5"></i>
                </button>
              </li>
              <li>
                <button type="button" class="btn btn-block btn-twitter">Connect with
                  <i class="ico-twitter2 ml5"></i>
                </button>
              </li>
            </ul> -->
            <!-- Social button -->
            <hr>
            <!-- horizontal line -->
            <!-- Login form -->
            <form class="panel" name="" action="{{URL::Route('verifyLogin')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="panel-body">
                <!-- Alert message -->
                @if(isset($message)) 
                <div class="alert alert-warning">
                  <span class="semibold">Note: </span>{{$message}}
                </div>
                @endif                
                <div class="form-group">
                  <div class="form-stack has-icon pull-left">
                    <input name="username" type="text" class="form-control input-lg" placeholder="Username" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in your username / email" data-parsley-required>
                    <i class="ico-user2 form-control-icon"></i>
                  </div>
                  <div class="form-stack has-icon pull-left">
                    <input name="password" type="password" class="form-control input-lg" placeholder="Password" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in your password" data-parsley-required>
                    <i class="ico-lock2 form-control-icon"></i>
                  </div>
                </div>
                <!-- Error container -->
                <div id="error-container" class="mb15"></div>
                <!--/ Error container -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6 text-right">
                      <a href="{{route('forgot_password')}}">Forgot password?</a>
                    </div>
                  </div>
                </div>
                <div class="form-group nm">
                  <button type="submit" class="btn btn-block btn-success">
                    <span class="semibold">Sign In</span>
                  </button>
                </div>
              </div>
            </form>
            <!-- Login form -->
            <hr>
            <!-- horizontal line -->
            <p class="text-muted text-center">Don't have any account? <a class="semibold" href="{{URL::Route('register')}}">Sign up to get started</a></p>
          </div>
        </div>
        <!--/ END row -->
      </div>
      <!--/ END Template Container -->
    </section>
    <!--/ END Template Main -->
    <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
    <!-- Application and vendor script : mandatory -->
    <script type="text/javascript">
      document.createElement('picture');
    </script>
    <script type="text/javascript" src="/javascript/vendor.js"></script>
    <script type="text/javascript" src="/javascript/core.js"></script>
    <script type="text/javascript" src="/javascript/backend/app.js"></script>
    <!--/ Application and vendor script : mandatory -->
    <!-- Plugins and page level script : optional -->
    <script type="text/javascript" src="/plugins/parsley/js/parsley.js"></script>
    <script type="text/javascript" src="/javascript/backend/pages/login.js"></script>
    <!--/ Plugins and page level script : optional -->
  </body>
  <!--/ END Body -->
</html>