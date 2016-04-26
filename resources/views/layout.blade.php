<!DOCTYPE html>

<html class="backend">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MoPen</title>
    <meta name="author" content="pampersdry.info">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/image/touch/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/image/touch/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/image/touch/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/image/touch/apple-touch-icon-57x57-precomposed.png">
    <link rel="shortcut icon" href="/image/favicon.ico">

    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/animatecss/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheet/layouts/layout.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheet/uielement.css')}}">

    <!--STEPS  for upload-->
    <link rel="stylesheet" href="{{asset('plugins/steps/css/jquery-steps.css')}}">

    <!--File upload -->
    <link rel="stylesheet" href="{{asset('/plugins/fileupload/css/fileupload.css')}}">

    <!-- Form Elements -->
    <link rel="stylesheet" href="{{asset('/plugins/selectize/css/selectize.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/jquery-ui/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/touchspin/css/touchspin.css')}}">

    <!-- X editable -- >
    <link rel="stylesheet" href="{{asset('plugins/xeditable/css/xeditable.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/xeditable/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css')}}">
    <!--CHARTS etc -->
        <!-- Plugins stylesheet : optional -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/animatecss/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/flot/css/flot.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/css/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/css/jqvmap.css')}}">

    <!-- CODE SYNTAX STUFF -->
    <link rel="stylesheet" href="{{asset('code/lib/codemirror.css')}}">
    <link rel="stylesheet" href="{{asset('code/addon/hint/show-hint.css')}}">
    <script type="text/javascript" src="/code/lib/codemirror.js"></script>
    <script type="text/javascript" src="/code/addon/hint/show-hint.js"></script>
    <script type="text/javascript" src="/code/addon/hint/xml-hint.js"></script>
    <script type="text/javascript" src="/code/mode/xml/xml.js"></script>
    <script type="text/javascript" src="/code/addon/mode/loadmode.js"></script>
    <script type="text/javascript" src="/code/mode/meta.js"></script>
    <script type="text/javascript" src="/code/mode/clike/clike.js"></script>
    <script type="text/javascript" src="/code/mode/xml/xml.js"></script>

    <!--/ Plugins stylesheet : optional --> 

    <script type="text/javascript" src="/plugins/modernizr/js/modernizr.js"></script>
  </head>
  <body>
    <header id="header" class="navbar">
      <div class="container-fluid">
        <div class="nav navbar-nav navbar-left">
            <span class="logo-figure"></span>
            <span class="logo-text">MoPen</span>
        </div>
        <div class="navbar-toolbar clearfix">
          <!-- START navbar form -->
          <div class="navbar-form navbar-left dropdown" id="dropdown-form">
            <form action="" role="search">
              <div class="has-icon">
                <input type="text" class="form-control" placeholder="Search application...">
                <i class="ico-search form-control-icon"></i>
              </div>
            </form>
          </div>
          <!-- START navbar form -->
          <!-- START Right nav -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Search form toggler  -->
            @if(Session::get('user_name'))
            <li class="pt15">
              <a href="{{ URL::Route('upload')}}">
                <span type="button" class="meta btn btn-primary">
                  <i class="ico-plus-circle"></i> Create New Post
                </span>
              </a>
            </li>
            <li>
              <a href="javascript:void(0);" data-toggle="dropdown" data-target="#dropdown-form">
                <span class="meta">
                  <span class="icon">
                    <i class="ico-search"></i>
                  </span>
                </span>
              </a>
            </li>
            @endif
            <!--/ Search form toggler -->
            <!-- Notification dropdown -->
            @if(Session::get('user_name'))
            <li class="dropdown custom" id="header-dd-notification">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                <span class="meta">
                  <span class="icon">
                    <i class="ico-bell"></i>
                  </span>
                  <span class="hasnotification hasnotification-danger"></span>
                </span>
              </a>
              <!-- Dropdown menu -->
              <div class="dropdown-menu" role="menu">
                <div class="dropdown-header">
                  <span class="title">Notification
                    <span class="count"></span>
                  </span>
                  <span class="option text-right"><a href="">View all</a></span>
                  <span class="option text-right"><a href="javascript:void(0);">Clear all</a></span>
                </div>
                <div class="dropdown-body slimscroll">
                  <!-- indicator -->
                  <div class="indicator inline">
                    <span class="spinner spinner16"></span>
                  </div>
                  <!--/ indicator -->
                  <!-- Message list -->
                  <div class="media-list">
                    <a href="javascript:void(0);" class="media read border-dotted">
                      <span class="media-left media-middle">
                        <i class="media-object ico-basket2 bgcolor-info"></i>
                      </span>
                      <span class="media-body media-middle">
                        <span class="media-text">Duis aute irure dolor in
                          <span class="text-primary semibold">reprehenderit</span> in voluptate.</span>
                        <!-- meta icon -->
                        <span class="media-meta pull-right">2d</span>
                        <!--/ meta icon -->
                      </span>
                    </a>
                    <a href="javascript:void(0);" class="media read border-dotted">
                      <span class="media-left media-middle">
                        <i class="media-object ico-call-incoming"></i>
                      </span>
                      <span class="media-body media-middle">
                        <span class="media-text">Aliquip ex ea commodo consequat.</span>
                        <!-- meta icon -->
                        <span class="media-meta pull-right">1w</span>
                        <!--/ meta icon -->
                      </span>
                    </a>
                    <a href="javascript:void(0);" class="media read border-dotted">
                      <span class="media-left media-middle">
                        <i class="media-object ico-alarm2"></i>
                      </span>
                      <span class="media-body media-middle">
                        <span class="media-text">Excepteur sint
                          <span class="text-primary semibold">occaecat</span> cupidatat non.</span>
                        <!-- meta icon -->
                        <span class="media-meta pull-right">12w</span>
                        <!--/ meta icon -->
                      </span>
                    </a>
                    <a href="javascript:void(0);" class="media read border-dotted">
                      <span class="media-left media-middle">
                        <i class="media-object ico-checkmark3 bgcolor-success"></i>
                      </span>
                      <span class="media-body media-middle">
                        <span class="media-text">Lorem ipsum dolor sit amet,
                          <span class="text-primary semibold">consectetur</span> adipisicing elit.</span>
                        <!-- meta icon -->
                        <span class="media-meta pull-right">14w</span>
                        <!--/ meta icon -->
                      </span>
                    </a>
                  </div>
                  <!--/ Message list -->
                </div>
              </div>
              <!--/ Dropdown menu -->
            </li>
            <!--/ Notification dropdown -->
            <!-- Profile dropdown -->
            <li class="dropdown profile">
              <a href="javascript:void(0);" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                <span class="meta">
                  <span class="avatar">
                    <img src="../../image/avatar/avatar7.jpg" class="img-circle" alt="" />
                  </span>
                  <span class="text hidden-xs hidden-sm pl5">{{Session::get('user_name')}}</span>
                  <span class="caret"></span>
                </span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li class="divider"></li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="icon">
                      <i class="ico-user-plus2"></i>
                    </span> Algo algo</a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="icon">
                      <i class="ico-cog4"></i>
                    </span> Profile Setting</a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="icon">
                      <i class="ico-question"></i>
                    </span> Help</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="{{ URL::Route('logout') }}">
                    <span class="icon">
                      <i class="ico-exit"></i>
                    </span> Sign Out</a>
                </li>
              </ul>
            </li>
            <!-- Profile dropdown -->
            <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
            <li class="navbar-main hidden-lg hidden-md hidden-sm">
              <a href="javascript:void(0);" data-toggle="sidebar" data-direction="rtl" rel="tooltip" title="Feed / contact sidebar">
                <span class="meta">
                  <span class="icon">
                    <i class="ico-users3"></i>
                  </span>
                </span>
              </a>
            </li>
            <!--/ Offcanvas right -->
             @else
            <li>
              <a href="{{ URL::Route('register') }}">
                <button type="button" class="btn btn-primary">
                <i class="ico-plus-circle"></i> Signup</button>
              </a>
            </li>
            <li>
                <a href="{{ URL::Route('login') }}">
                  <button type="button" class="btn btn-primary">
                  <i class="ico-plus-circle"></i> Login</button>
                </a>  
            </li>
            @endif
          </ul>
          <!--/ END Right nav -->
        </div>
        <!--/ END Toolbar -->
      </div>
      <!--/ END container fluid -->
    </header>
    <!--/ END Template Header -->

    <!-- TODO  DOOOOOOSTART Template Sidebar (right) -->
    <aside class="sidebar sidebar-right">
      <!-- START Offcanvas -->
      <div class="offcanvas-container" data-toggle="offcanvas" data-options='{"openerClass":"offcanvas-opener", "closerClass":"offcanvas-closer"}'>
        <!-- START Wrapper -->
        <div class="offcanvas-wrapper">
          <!-- Offcanvas Left -->
          <div class="offcanvas-left">
            <!-- Header -->
            <div class="header pl0 pr0">
              <ul class="list-table nm">
                <li style="width:50px;height:34px;" class="text-center">
                  <a href="javascript:void(0);" class="text-default offcanvas-closer">
                    <i class="ico-arrow-left6 fsize16"></i>
                  </a>
                </li>
                <li class="text-center">
                  <h5 class="semibold nm">Settings</h5>
                </li>
                <li style="width:50px;height:34px;" class="text-center">
                  <a href="javascript:void(0);" class="text-default">
                    <i class="ico-info22 fsize16"></i>
                  </a>
                </li>
              </ul>
            </div>
            <!--/ Header -->
            <!-- Content 
            <div class="content slimscroll">
              <h5 class="heading">News Feed</h5>
              <ul class="topmenu">
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-plus"></i>
                    </span>
                    <span class="text">Add &amp; Manage Source</span>
                    <span class="arrow"></span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-google-plus"></i>
                    </span>
                    <span class="text">Google Reader</span>
                    <span class="arrow"></span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-twitter2"></i>
                    </span>
                    <span class="text">Twitter Source</span>
                    <span class="arrow"></span>
                  </a>
                </li>
              </ul>
              <h5 class="heading">Friends</h5>
              <ul class="topmenu">
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-search22"></i>
                    </span>
                    <span class="text">Find Friends</span>
                    <span class="arrow"></span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-user-plus2"></i>
                    </span>
                    <span class="text">Add Friends</span>
                    <span class="arrow"></span>
                  </a>
                </li>
              </ul>
              <h5 class="heading">Account</h5>
              <ul class="topmenu">
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-user2"></i>
                    </span>
                    <span class="text">Edit Account</span>
                    <span class="arrow"></span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-envelop"></i>
                    </span>
                    <span class="text">Manage Subscription</span>
                    <span class="arrow"></span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-location6"></i>
                    </span>
                    <span class="text">Location Service</span>
                    <span class="arrow"></span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);">
                    <span class="figure">
                      <i class="ico-switch"></i>
                    </span>
                    <span class="text">Logout</span>
                    <span class="arrow"></span>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);" class="text-danger">
                    <span class="figure">
                      <i class="ico-minus-circle2"></i>
                    </span>
                    <span class="text">Deactivate</span>
                    <span class="arrow"></span>
                  </a>
                </li>
              </ul>
            </div>
            <!--/ Content -->
          </div>
          <!--/ Offcanvas Left -->
          <!-- Offcanvas Content -->
          <div class="offcanvas-content">
            <!-- Content -->
            <div class="content slimscroll">
              <!-- START profile -->
              <div class="panel nm">
                <!-- thumbnail -->
                <div class="thumbnail">
                  <!-- media -->
                  <div class="media">
                    <!-- indicator -->
                    <div class="indicator">
                      <span class="spinner"></span>
                    </div>
                    <!--/ indicator -->
                    <img data-toggle="unveil" src="/image/background/400x250/placeholder.jpg" data-src="/image/background/400x250/background3.jpg" alt="Cover" width="100%">
                  </div>
                  <!--/ media -->
                </div>
                <!--/ thumbnail -->
              </div>
              <div class="panel-body text-center" style="margin-top:-55px;z-index:11">
                <img class="img-circle mb5" src="/image/avatar/avatar7.jpg" alt="" width="75">
                <h5 class="bold mt0 mb5">Tania Alvarez</h5>
                <p>Algo</p>
                <button type="button" class="btn btn-primary offcanvas-opener offcanvas-open-ltr">
                  <i class="ico-settings"></i> Settings</button>
              </div>
              <!--/ END profile 
              <ul class="media-list media-list-feed nm">
                <li class="media">
                  <div class="media-left">
                    <i class="media-object ico-pencil bgcolor-success"></i>
                  </div>
                  <div class="media-body">
                    <p class="media-heading">EDIT EXISTING PAGE</p>
                    <p class="media-text">
                      <span class="text-primary semibold">Service Page</span> has been edited by Tamara Moon.</p>
                    <p class="media-meta">Just Now</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <i class="media-object ico-file-plus bgcolor-success"></i>
                  </div>
                  <div class="media-body">
                    <p class="media-heading">CREATE A NEW PAGE</p>
                    <p class="media-text">
                      <span class="text-primary semibold">Service Page</span> has been created by Tamara Moon.</p>
                    <p class="media-meta">2 Hour Ago</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <i class="media-object ico-upload22 bgcolor-success"></i>
                  </div>
                  <div class="media-body">
                    <p class="media-heading">UPLOAD CONTENT</p>
                    <p class="media-text">Tamara Moon has uploaded 8 new item to the directory</p>
                    <p class="media-meta">3 Hour Ago</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <img src="/image/avatar/avatar6.jpg" class="media-object img-circle" alt="">
                  </div>
                  <div class="media-body">
                    <p class="media-heading">NEW MESSAGE</p>
                    <p class="media-text">Arthur Abbott send you a message</p>
                    <p class="media-meta">3 Hour Ago</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <i class="media-object ico-upload22 bgcolor-success"></i>
                  </div>
                  <div class="media-body">
                    <p class="media-heading">UPLOAD CONTENT</p>
                    <p class="media-text">Tamara Moon has uploaded 3 new item to the directory</p>
                    <p class="media-meta">7 Hour Ago</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <i class="media-object ico-link5 bgcolor-success"></i>
                  </div>
                  <div class="media-body">
                    <p class="media-heading">NEW UPDATE AVAILABLE</p>
                    <p class="media-text">3 new update is available to download</p>
                    <p class="media-meta">Yesterday</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <i class="media-object ico-loop4"></i>
                  </div>
                  <div class="media-body">
                    <a href="javascript:void(0);" class="media-heading text-primary">Load more feed</a>
                  </div>
                </li>
              </ul>
              <!--/ Media list feed -->              
            </div>
            <!--/ Content -->
          </div>
          <!--/ Offcanvas Content -->
          <!-- Offcanvas Right -->
          <div class="offcanvas-right">
            <!-- Header -->
            <div class="header pl0 pr0">
              <ul class="list-table nm">
                <li style="width:50px;height:34px;" class="text-center">
                  <a href="javascript:void(0);" class="text-default offcanvas-closer">
                    <i class="ico-arrow-left6 fsize16"></i>
                  </a>
                </li>
                <li class="text-center">
                  <h5 class="semibold nm">Autumn Barker</h5>
                </li>
                <li style="width:50px;height:34px;" class="text-center">
                  <a href="javascript:void(0);" class="text-default">
                    <i class="ico-info22 fsize16"></i>
                  </a>
                </li>
              </ul>
            </div>
            <!--/ Header -->
            <!-- Footer -->
            <div class="footer">
              <div class="has-icon">
                <input type="text" class="form-control" placeholder="Type message...">
                <i class="ico-paper-plane form-control-icon"></i>
              </div>
            </div>
            <!--/ Footer -->
            <!-- Content -->
            <div class="content slimscroll">
              <!-- START chat -->
              <ul class="media-list media-list-bubble">
                <li class="media">
                  <div class="media-body media-middle">
                    <p class="media-text">eros non enim commodo hendrerit.</p>
                    <span class="clearfix"></span>
                    <p class="media-text">Suspendisse dui.</p>
                    <span class="clearfix"></span>
                    <p class="media-text">eu nulla at</p>
                    <!-- meta -->
                    <span class="clearfix"></span>
                    <!-- important: clearing floated media text -->
                    <p class="media-meta">Sun, Mar 02</p>
                  </div>
                  <div class="media-right">
                    <a href="javascript:void(0);" class="media-object">
                      <img src="/image/avatar/avatar7.jpg" class="img-circle" alt="">
                    </a>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="javascript:void(0);" class="media-object">
                      <img src="/image/avatar/avatar6.jpg" class="img-circle" alt="">
                    </a>
                  </div>
                  <div class="media-body media-middle">
                    <p class="media-text">Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat.</p>
                    <span class="clearfix"></span>
                    <p class="media-text">faucibus ut, nulla. Cras eu tellus</p>
                    <!-- meta -->
                    <span class="clearfix"></span>
                    <!-- important: clearing floated media text -->
                    <p class="media-meta">Tue, Oct 01</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-body media-middle">
                    <p class="media-text">Duis a mi fringilla mi lacinia mattis. Integer</p>
                    <!-- meta -->
                    <span class="clearfix"></span>
                    <!-- important: clearing floated media text -->
                    <p class="media-meta">Fri, Sep 27</p>
                  </div>
                  <div class="media-right">
                    <a href="javascript:void(0);" class="media-object">
                      <img src="/image/avatar/avatar7.jpg" class="img-circle" alt="">
                    </a>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="javascript:void(0);" class="media-object">
                      <img src="/image/avatar/avatar6.jpg" class="img-circle" alt="">
                    </a>
                  </div>
                  <div class="media-body media-middle">
                    <p class="media-text">Praesent interdum ligula eu enim. Etiam imperdiet dictum magna.</p>
                    <!-- meta -->
                    <span class="clearfix"></span>
                    <!-- important: clearing floated media text -->
                    <p class="media-meta">Wed, Aug 28</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-body media-middle">
                    <p class="media-text">Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna.</p>
                    <!-- meta -->
                    <span class="clearfix"></span>
                    <!-- important: clearing floated media text -->
                    <p class="media-meta">Sat, Sep 27</p>
                  </div>
                  <div class="media-right">
                    <a href="javascript:void(0);" class="media-object">
                      <img src="/image/avatar/avatar7.jpg" class="img-circle" alt="">
                    </a>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="javascript:void(0);" class="media-object">
                      <img src="/image/avatar/avatar6.jpg" class="img-circle" alt="">
                    </a>
                  </div>
                  <div class="media-body media-middle">
                    <p class="media-text">Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac</p>
                    <span class="clearfix"></span>
                    <p class="media-text">Nam porttitor scelerisque neque</p>
                    <!-- meta -->
                    <span class="clearfix"></span>
                    <!-- important: clearing floated media text -->
                    <p class="media-meta">Sun, Feb 22</p>
                  </div>
                </li>
              </ul>
              <!--/ END chat -->
            </div>
            <!--/ Content -->
          </div>
          <!--/ Offcanvas Right -->
        </div>
        <!--/ END Wrapper -->
      </div>

    </aside>
    <section id="main" role="main">
      <div class="container-fluid">
        <div>
          @yield('content')
        </div>
        <div>
          @yield('code')
        </div>
      </div>

      <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%">
        <i class="ico-angle-up"></i>
      </a>
    </section>
    <script type="text/javascript">
      document.createElement('picture');
    </script>
    <script type="text/javascript" src="/javascript/vendor.js"></script>
    <script type="text/javascript" src="/javascript/core.js"></script>
    <script type="text/javascript" src="/javascript/backend/app.js"></script>

    <!--Tables/ charts -->

<!-- Grid of items -->
    <script type="text/javascript" src="/plugins/magnific/js/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="/plugins/shuffle/js/jquery.shuffle.js"></script>
    <script type="text/javascript" src="/javascript/backend/pages/media-gallery.js"></script>

<!--Modal -->
      <script type="text/javascript" src="/plugins/bootbox/js/bootbox.js"></script>
    <script type="text/javascript" src="/plugins/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/javascript/backend/components/notification.js"></script>

    <!--Register -->
        <script type="text/javascript" src="/plugins/parsley/js/parsley.js"></script>
    <script type="text/javascript" src="/javascript/backend/pages/register.js"></script>

    <!--Upload -->
      <script type="text/javascript" src="/plugins/steps/js/jquery-steps.js"></script>
    <script type="text/javascript" src="/plugins/parsley/js/parsley.js"></script>
    <script type="text/javascript" src="/plugins/inputmask/js/inputmask.js"></script>
    <script type="text/javascript" src="/javascript/backend/forms/wizard.js"></script>

    <!-- Forms 2 -->
    <script type="text/javascript" src="/plugins/selectize/js/selectize.js"></script>
    <script type="text/javascript" src="/plugins/jquery-ui/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/plugins/jquery-ui/js/addon/timepicker/jquery-ui-timepicker.js"></script>
    <script type="text/javascript" src="/plugins/jquery-ui/js/jquery-ui-touch.js"></script>
    <script type="text/javascript" src="/plugins/select2/js/select2.js"></script>
    <script type="text/javascript" src="/plugins/touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <script type="text/javascript" src="/javascript/backend/forms/element.js"></script>
    <!--/ Plugins and page level script : optional -->
    <!--file upload -->
    <script type="text/javascript" src="/plugins/fileupload/js/vendor/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/vendor/load-image.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/vendor/load-image-meta.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/vendor/load-image-exif.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/vendor/load-image-ios.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/vendor/canvas-to-blob.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/vendor/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/jquery.fileupload.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/jquery.fileupload-process.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/jquery.fileupload-image.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/jquery.fileupload-audio.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/jquery.fileupload-video.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/jquery.fileupload-validate.js"></script>
    <script type="text/javascript" src="/plugins/fileupload/js/jquery.fileupload-ui.js"></script>
    <script type="text/javascript" src="/javascript/backend/forms/fileupload.js"></script>

    <!-- Code prettify -->
    <script type="text/javascript" src="/plugins/prettify/js/prettify.js"></script>
    <script type="text/javascript" src="/javascript/backend/components/typography.js"></script>

    <!-- X editable -->
    <script type="text/javascript" src="/plugins/xeditable/js/bootstrap-editable.js"></script>
    <script type="text/javascript" src="/plugins/xeditable/inputs-ext/address/address.js"></script>
    <script type="text/javascript" src="/plugins/xeditable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
    <script type="text/javascript" src="/plugins/xeditable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
    <script type="text/javascript" src="/javascript/backend/forms/xeditable.js"></script>

    <!-- Plugins and page level script : optional -->
    <script type="text/javascript" src="/plugins/flot/js/jquery.flot.js"></script>
    <script type="text/javascript" src="/plugins/flot/js/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="/plugins/flot/js/jquery.flot.categories.js"></script>
    <script type="text/javascript" src="/plugins/flot/js/jquery.flot.time.js"></script>
    <script type="text/javascript" src="/plugins/flot/js/jquery.flot.tooltip.js"></script>
    <script type="text/javascript" src="/plugins/flot/js/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="/plugins/owl/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/datatables-bs3.js"></script>
    <script type="text/javascript" src="/plugins/jqvmap/js/jquery.vmap.js"></script>
    <!--/ Plugins and page level script : optional -->

    <!-- Owl Carousel -->
    <script type="text/javascript" src="/plugins/owl/js/owl.carousel.js"></script>
    <script type="text/javascript" src="/javascript/backend/components/carousel.js"></script>

    <!-- Single post sortable -->
    <script type="text/javascript" src="/plugins/jquery-ui/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/javascript/backend/components/sortable.js"></script>

    <!--ANIMATIONS -->
    <script type="text/javascript" src="/javascript/backend/components/animation.js"></script>


  </body>
</html>