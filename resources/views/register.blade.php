<!DOCTYPE html>

<html class="backend">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mopen</title>
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../plugins/animatecss/css/animate.css">
    <link rel="stylesheet" href="../../stylesheet/layouts/layout.css">
    <link rel="stylesheet" href="../../stylesheet/uielement.css">
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
            <div class="text-center" style="margin-bottom:20px;">
              <span class=""></span>
              <span class=""></span>
              <h5 class="semibold text-muted mt-5">Create a new account.</h5>
            </div>
            <!--/ Brand -->
            <!-- Register form -->
            <form class="panel" action="{{ URL::Route('register_new_user') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @if (isset($message))
              <ul class="list-table pa15">
                <li>
                  <!-- Alert message -->
                  @if(isset($message_type))
                    <div class="alert alert-success nm">
                  @else
                    <div class="alert alert-warning nm">
                  @endif
                    <span class="semibold">Note :</span>&nbsp;&nbsp;{{$message}}
                  </div>
                  <!--/ Alert message -->
                </li>
                <li class="text-right" style="width:20px;">
                  <a href="javascript:void(0);">
                    <i class="ico-question-sign fsize16"></i>
                  </a>
                </li>
              </ul>
             @endif
              <hr class="nm">
              <div class="panel-body">
                <div class="form-group">
                  <label class="control-label">Full Name</label>
                  <div class="has-icon pull-left">
                    <input type="text" class="form-control" name="full_name" data-parsley-required>
                    <i class="ico-user2 form-control-icon"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Username</label>
                  <div class="has-icon pull-left">
                    <input type="text" class="form-control" name="username" data-parsley-required>
                    <i class="ico-user2 form-control-icon"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <div class="has-icon pull-left">
                    <input type="password" class="form-control" name="password" data-parsley-required>
                    <i class="ico-key2 form-control-icon"></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Retype Password</label>
                  <div class="has-icon pull-left">
                    <input type="password" class="form-control" name="retype-password" data-parsley-equalto="input[name=password]">
                    <i class="ico-asterisk form-control-icon"></i>
                  </div>
                </div>
              </div>
              <hr class="nm">
              <div class="panel-body">
                <p class="semibold text-muted">To confirm and activate your new account, we will need to send the activation code to your e-mail.</p>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <div class="has-icon pull-left">
                    <input type="email" class="form-control" name="email" placeholder="your@email.com">
                    <i class="ico-envelop form-control-icon"></i>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox custom-checkbox">
                    <input type="checkbox" name="agree" id="agree" value="1">
                    <label for="agree">&nbsp;&nbsp;I agree to the <a class="semibold" href="javascript:void(0);">Term Of Services</a></label>
                  </div>
                </div>
              </div>
              <div class="panel-footer">
                <button type="submit" class="btn btn-block btn-success">
                  <span class="semibold">Sign up</span>
                </button>
              </div>
            </form>
            <!-- Register form -->
            <hr>
            <!-- horizontal line -->
            <p class="text-center">
              <span class="text-muted">Already have an account? <a class="semibold" href="{{URL::Route('login')}}">Sign in here</a></span>
            </p>
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
    <script type="text/javascript" src="../../javascript/vendor.js"></script>
    <script type="text/javascript" src="../../javascript/core.js"></script>
    <script type="text/javascript" src="../../javascript/backend/app.js"></script>
    <!--/ Application and vendor script : mandatory -->
    <!-- Plugins and page level script : optional -->
    <script type="text/javascript" src="../../plugins/parsley/js/parsley.js"></script>
    <script type="text/javascript" src="../../javascript/backend/pages/register.js"></script>
    <!--/ Plugins and page level script : optional -->
  </body>
  <!--/ END Body -->
</html>