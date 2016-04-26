<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Mopen</title>
    <link rel="icon" type="image/png" href="update/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Bootstrap -->
    <link href="{{asset('update/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('update/css/style.css')}}" rel="stylesheet" media="screen">
    
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
    
    </head>
    <body class="page-index">
    <?php $loggedin = true ?>
        <div class="container" id="container">
        
            <div class="row top">
                <div class="col-lg-12 col-md-12 col-sm-12 col-left">
                    <div class="name"><a href="{{URL::Route('update2')}}">MoPen</a></div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-7 col-left">

                </div>
                <div class="col-lg-4 col-md-4 col-sm-5 col-right">
                    <nav>
                        <ul class="list-inline" id="menu">
                            <li class="active"> <!-- TODO: change active per page -->
                                <a href="{{URL::Route('post2')}}">Posts</a>
                            </li>
                            <li>
                                <a href="{{URL::Route('people2')}}">People</a>
                            </li>
                            @if($loggedin)
                            <li>
                                <a href="{{URL::Route('profile2')}}">Profile</a>
                            </li>
                            <li>
                                <a href="">Upload</a>
                            </li>
                            @else
                            <li>
                                <a href="{{URL::Route('login')}}">Login</a>
                            </li>
                            <li class="last">
                                <a href="{{URL::Route('register')}}">Register</a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row bottom">
                <div class="col-lg-8 col-md-8 col-sm-7 col-left">
                    <div>
                        <section>
                            @yield('main') 
                        </section>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-5 col-right">
                    <div id="scroll-shadow"></div>
                        @yield('side')
                    <a class="btn btn-block scroll-top visible-xs">
                        <img src="update/img/icon/icon-chevron.png" alt="Scroll top">
                    </a>
                </div>
            </div>                        
        </div>  
                
        <script src="update/js/jquery.js"></script>
        
        <!-- FASTCLICK -->
        <script src="update/js/plugins/fastclick/fastclick.js"></script>
        <!-- SMOOTH SCROLL -->
        <script src="update/js/plugins/smooth-scroll/jquery.smooth-scroll.min.js"></script>
        <!-- MIXITUP -->
        <script src="update/js/plugins/mixitup/jquery.mixitup.min.js"></script>
        
        <script src="update/js/main.js"></script>
    </body>
</html>
