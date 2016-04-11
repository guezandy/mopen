@extends('layout')

@section('content')
        <!-- Page Header -->
        <div class="page-header page-header-block">
          <div class="page-header-section">
            <h4 class="title semibold">Post and ish</h4>
          </div>
          <div class="page-header-section">
            <!-- Toolbar -->
            <div class="toolbar">
              <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="#">username</a></li>
                <li class="active">Post</li>
              </ol>
            </div>
            <!--/ Toolbar -->
          </div>
        </div>
        <!-- Page Header -->
        <!-- START Row -->
        <div class="row">
<!-- START right / bottom side -->
          <div class="col-lg-3">
             <div class="col-xs-12">
            <!-- START Widget Panel -->
            <div class="widget panel">
              <!-- panel body -->
              <div class="panel-body">
                <ul class="list-table">
                  <li style="width:70px;">
                    <img class="img-circle img-bordered" src="/image/avatar/avatar1.jpg" alt="" width="65px" height="65px">
                  </li>
                  <li class="text-left">
                    <h5 class="semibold ellipsis">
                      John Snow
                      <br/>
                      <small class="text-muted">@JSnow</small>
                    </h5>
                  </li>
                  <li class="text-right">
                    <button type="button" class="btn btn-info">
                      <span class="ico-twitter"></span> Follow</button>
                  </li>
                </ul>
                <!-- Nav section -->
                <ul class="nav nav-section nav-justified mt15">
                  <li>
                    <div class="section">
                      <h4 class="nm">12.5k</h4>
                      <p class="nm text-muted">Followers</p>
                    </div>
                  </li>
                  <li>
                    <div class="section">
                      <h4 class="nm">1853</h4>
                      <p class="nm text-muted">Following</p>
                    </div>
                  </li>
                  <li>
                    <div class="section">
                      <h4 class="nm">3451</h4>
                      <p class="nm text-muted">Tweets</p>
                    </div>
                  </li>
                </ul>
                <!--/ Nav section -->
              </div>
              <!--/ panel body -->
            </div>
            <!--/ END Widget Panel -->
          </div>
          <div class="col-xs-12">
	        <div class="col-sm-6">
	            <div class="panel panel-default">
	              <!-- panel body with collapse capable -->
	              <div class="panel-collapse pull out">
	                <div class="panel-body">
	                  <button type="button" class="btn btn-link btn-toggle-anim" data-anim="tada" title="Play">
	                    <i class="ico-heart-empty"></i>
	                  </button>
	                </div>
	              </div>
	              <!--/ panel body with collapse capabale -->
	            </div>
	        </div>
	        <div class="col-sm-6">
	            <div class="panel panel-default">
	              <!-- panel body with collapse capable -->
	              <div class="panel-collapse pull out">
	                <div class="panel-body">
	                  <button type="button" class="btn btn-link btn-toggle-anim" data-anim="tada" title="Play">
	                    <i class="ico-save"></i>
	                  </button>
	                </div>
	              </div>
	              <!--/ panel body with collapse capabale -->
	            </div>
	        </div>          
          </div>
            <!-- Tags -->
            <div class="row">
              <div class="col-xs-12">
                <h5 class="semibold mt0 text-primary">Tags</h5>
                <div class="btn-tag">
                  <a href="javascript:void(0);" class="btn btn-default btn-sm">wordpress</a>
                  <a href="javascript:void(0);" class="btn btn-default btn-sm">development</a>
                </div>
              </div>
            </div>
            <!-- Tags -->
            <hr>
            <!-- Tabbed content -->
            <div class="row">
              <div class="col-xs-12">
                <h5 class="semibold mt0 text-primary">Similar Posts</h5>
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#popular" data-toggle="tab">Overall</a></li>
                  <li class=""><a href="#recent" data-toggle="tab">Tag1</a></li>
                  <li class=""><a href="#recent" data-toggle="tab">Tag2</a></li>
                  <li class=""><a href="#recent" data-toggle="tab">Tag3</a></li>
                </ul>
                <div class="tab-content panel nm">
                  <div class="tab-pane active pl0 pr0" id="popular">
                    <!-- Media list -->
                    <div class="media-list">
                      <a href="javascript:void(0);" class="media border-dotted">
                        <span class="media-left media-middle">
                          <img src="/image/background/400x400/background1.jpg" class="media-object img-circle" alt="">
                        </span>
                        <span class="media-body media-middle">
                          <!-- meta icon -->
                          <span class="media-meta">Jan 13, 2014</span>
                          <!--/ meta icon -->
                          <span class="media-heading">Lorem ipsum dolor sit amet</span>
                        </span>
                      </a>
                      <a href="javascript:void(0);" class="media border-dotted">
                        <span class="media-left media-middle">
                          <img src="/image/background/400x400/background2.jpg" class="media-object img-circle" alt="">
                        </span>
                        <span class="media-body media-middle">
                          <!-- meta icon -->
                          <span class="media-meta">Nov 27, 2014</span>
                          <!--/ meta icon -->
                          <span class="media-heading">Mauris eu turpis. Nulla aliquet.</span>
                        </span>
                      </a>
                      <a href="javascript:void(0);" class="media border-dotted">
                        <span class="media-left media-middle">
                          <img src="/image/background/400x400/background3.jpg" class="media-object img-circle" alt="">
                        </span>
                        <span class="media-body media-middle">
                          <!-- meta icon -->
                          <span class="media-meta">Oct 13, 2014</span>
                          <!--/ meta icon -->
                          <span class="media-heading">Consectetur adipisicing elit.</span>
                        </span>
                      </a>
                    </div>
                    <!--/ Message list -->
                  </div>
                  <div class="tab-pane pl0 pr0" id="recent">
                    <!-- Media list -->
                    <div class="media-list">
                      <a href="javascript:void(0);" class="media border-dotted">
                        <span class="media-left media-middle">
                          <img src="/image/background/400x400/background4.jpg" class="media-object img-circle" alt="">
                        </span>
                        <span class="media-body media-middle">
                          <!-- meta icon -->
                          <span class="media-meta">Apr 26, 2013</span>
                          <!--/ meta icon -->
                          <span class="media-heading">Ut enim ad minim veniam</span>
                        </span>
                      </a>
                      <a href="javascript:void(0);" class="media border-dotted">
                        <span class="media-left media-middle">
                          <img src="/image/background/400x400/background5.jpg" class="media-object img-circle" alt="">
                        </span>
                        <span class="media-body media-middle">
                          <!-- meta icon -->
                          <span class="media-meta">Nov 30, 2013</span>
                          <!--/ meta icon -->
                          <span class="media-heading">Duis aute irure dolor in reprehenderit.</span>
                        </span>
                      </a>
                      <a href="javascript:void(0);" class="media border-dotted">
                        <span class="media-left media-middle">
                          <img src="/image/background/400x400/background6.jpg" class="media-object img-circle" alt="">
                        </span>
                        <span class="media-body media-middle">
                          <!-- meta icon -->
                          <span class="media-meta">Oct 8, 2014</span>
                          <!--/ meta icon -->
                          <span class="media-heading">Excepteur sint occaecat cupidatat non</span>
                        </span>
                      </a>
                    </div>
                    <!--/ Message list -->
                  </div>
                </div>
              </div>
            </div>
            <!-- Tabbed content -->
          </div>
          <!--/ END right / bottom side -->

        <!-- START left / top side -->
        <div class="col-lg-9">

        <div class="row">
          <div class="col-sm-12">
            <!-- example 4 -->
            <div class="panel nm no-border">
              <div class="panel-body owl-carousel" id="one-slide">
                <!-- slide #1 -->
                <div class="row item table-layout">
                  <div class="col-sm-3 text-center">
                    <img src="../../image/mockup/iphone-front.jpg" alt="cost-per-impression" width="100">
                  </div>
                  <div class="col-sm-9">
                    <h4>Image 1 title</h4>
                    <p class="text-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                  </div>
                </div>
                <!--/ slide #1 -->
                <!-- slide #2 -->
                <div class="row item table-layout">
                  <div class="col-sm-3 text-center">
                    <img src="../../image/mockup/iphone-front.jpg" alt="cost-per-impression" width="100">
                  </div>
                  <div class="col-sm-9">
                    <h4>Image 2 title</h4>
                    <p class="text-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                  </div>
                </div>
                <!--/ slide #2 -->
                <!-- slide #3 -->
                <div class="row item table-layout">
                  <div class="col-sm-3 text-center">
                    <img src="../../image/mockup/iphone-front.jpg" alt="cost-per-impression" width="100">
                  </div>
                  <div class="col-sm-9">
                    <h4>Image 3 title</h4>
                    <p class="text-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                  </div>
                </div>
                <!--/ slide #3 -->
              </div>
            </div>
            <!--/ example 4 -->
          </div>
        </div>
        <!--/ END Row -->

        <!-- START row -->
        <div class="row" id="sortable-panel">
        <div class="col-sm-6">
        	<h1>Code files </h1>
        @for($i = 0; $i < 3; $i++)
          <div class="col-md-12 sortable">
            <!-- START panel -->
            <div class="panel panel-primary">
              <!-- panel heading/header -->
              <div class="panel-heading handle">
                <h3 class="panel-title">
                  <i class="ico-queen mr5"></i> File{{$i}}.java</h3>
                <!-- panel toolbar -->
                <div class="panel-toolbar text-right">
                  <!-- option -->
                  <div class="option">
                    <button type="button" class="btn up" data-toggle="panelcollapse">
                      <i class="arrow"></i>
                    </button>
                    <button type="button" class="btn" data-toggle="panelremove" data-parent=".col-md-4">
                      <i class="remove"></i>
                    </button>
                  </div>
                  <!--/ option -->
                </div>
                <!--/ panel toolbar -->
              </div>
              <!--/ panel heading/header -->
              <!-- panel body with collapse capable -->
              <div class="panel-collapse pull out">
                <div class="panel-body">
                  Lorem ipsum dolor sit amet, mei essent everti theophrastus an, accusam lucilius vis eu. In mei accusamus efficiendi mediocritatem, eos ex paulo complectitur.
                </div>
              </div>
              <!--/ panel body with collapse capabale -->
            </div>
            <!--/ END panel -->
          </div>
          @endfor
          </div>
          <div class="col-sm-6">
          <h1> Resource Files</h1>
          @for($i = 0; $i < 5; $i++)
          <div class="col-md-12 sortable">
            <!-- START panel -->
            <div class="panel panel-inverse">
              <!-- panel heading/header -->
              <div class="panel-heading handle">
                <h3 class="panel-title">
                  <i class="ico-queen mr5"></i> Resource{{$i}}.xml</h3>
                <!-- panel toolbar -->
                <div class="panel-toolbar text-right">
                  <!-- option -->
                  <div class="option">
                    <button type="button" class="btn up" data-toggle="panelcollapse">
                      <i class="arrow"></i>
                    </button>
                    <button type="button" class="btn" data-toggle="panelremove" data-parent=".col-md-4">
                      <i class="remove"></i>
                    </button>
                  </div>
                  <!--/ option -->
                </div>
                <!--/ panel toolbar -->
              </div>
              <!--/ panel heading/header -->
              <!-- panel body with collapse capable -->
              <div class="panel-collapse pull out">
                <div class="panel-body">
                  Lorem ipsum dolor sit amet, mei essent everti theophrastus an, accusam lucilius vis eu. In mei accusamus efficiendi mediocritatem, eos ex paulo complectitur.
                </div>
              </div>
              <!--/ panel body with collapse capabale -->
            </div>
            <!--/ END panel -->
          </div>
          @endfor
          </div>
        </div>
        <!--/ END row -->
        <div class="row">
        	<h1>Assets</h1>
        </div>
            <div class="owl-carousel" id="lazy-load">
              <!-- thumbnail #1 -->
              <div class="item thumbnail">
                <!-- media -->
                <div class="media">
                  <!-- toolbar overlay -->
                  <div class="overlay">
                    <div class="toolbar">
                      <a href="#" class="btn btn-danger" title="love this picture">
                        <i class="ico-search"></i>
                      </a>
                    </div>
                  </div>
                  <!--/ toolbar overlay -->
                  <!-- meta -->
                  <span class="meta bottom darken">
                    <h5 class="nm semibold">background1.jpg</h5>
                  </span>
                  <!--/ meta -->
                  <img class="lazyOwl" data-src="/image/background/400x400/background1.jpg" alt="Photo" width="100%" />
                </div>
                <!--/ media -->
              </div>
              <!--/ thumbnail #1 -->
              <!-- thumbnail #2 -->
              <div class="item thumbnail">
                <!-- media -->
                <div class="media">
                  <!-- toolbar overlay -->
                  <div class="overlay">
                    <div class="toolbar">
                      <a href="#" class="btn btn-danger" title="love this picture">
                        <i class="ico-search"></i>
                      </a>
                    </div>
                  </div>
                  <!--/ toolbar overlay -->
                  <!-- meta -->
                  <span class="meta bottom darken">
                    <h5 class="nm semibold">background2.jpg</h5>
                  </span>
                  <!--/ meta -->
                  <img class="lazyOwl" data-src="/image/background/400x400/background2.jpg" alt="Photo" width="100%" />
                </div>
                <!--/ media -->
              </div>
              <!--/ thumbnail #2 -->
              <!-- thumbnail #3 -->
              <div class="item thumbnail">
                <!-- media -->
                <div class="media">
                  <!-- toolbar overlay -->
                  <div class="overlay">
                    <div class="toolbar">
                      <a href="#" class="btn btn-danger" title="love this picture">
                        <i class="ico-search"></i>
                      </a>
                    </div>
                  </div>
                  <!--/ toolbar overlay -->
                  <!-- meta -->
                  <span class="meta bottom darken">
                    <h5 class="nm semibold">background3.jpg</h5>
                  </span>
                  <!--/ meta -->
                  <img class="lazyOwl" data-src="/image/background/400x400/background3.jpg" alt="Photo" width="100%" />
                </div>
                <!--/ media -->
              </div>
              <!--/ thumbnail #3 -->
              <!-- thumbnail #4 -->
              <div class="item thumbnail">
                <!-- media -->
                <div class="media">
                  <!-- toolbar overlay -->
                  <div class="overlay">
                    <div class="toolbar">
                      <a href="#" class="btn btn-danger" title="love this picture">
                        <i class="ico-search"></i>
                      </a>
                    </div>
                  </div>
                  <!--/ toolbar overlay -->
                  <!-- meta -->
                  <span class="meta bottom darken">
                    <h5 class="nm semibold">background4.jpg</h5>
                  </span>
                  <!--/ meta -->
                  <img class="lazyOwl" data-src="/image/background/400x400/background4.jpg" alt="Photo" width="100%" />
                </div>
                <!--/ media -->
              </div>
              <!--/ thumbnail #4 -->
              <!-- thumbnail #5 -->
              <div class="item thumbnail">
                <!-- media -->
                <div class="media">
                  <!-- toolbar overlay -->
                  <div class="overlay">
                    <div class="toolbar">
                      <a href="#" class="btn btn-danger" title="love this picture">
                        <i class="ico-search"></i>
                      </a>
                    </div>
                  </div>
                  <!--/ toolbar overlay -->
                  <!-- meta -->
                  <span class="meta bottom darken">
                    <h5 class="nm semibold">background5.jpg</h5>
                  </span>
                  <!--/ meta -->
                  <img class="lazyOwl" data-src="/image/background/400x400/background5.jpg" alt="Photo" width="100%" />
                </div>
                <!--/ media -->
              </div>
              <!--/ thumbnail #5 -->
              <!-- thumbnail #6 -->
              <div class="item thumbnail">
                <!-- media -->
                <div class="media">
                  <!-- toolbar overlay -->
                  <div class="overlay">
                    <div class="toolbar">
                      <a href="#" class="btn btn-danger" title="love this picture">
                        <i class="ico-search"></i>
                      </a>
                    </div>
                  </div>
                  <!--/ toolbar overlay -->
                  <!-- meta -->
                  <span class="meta bottom darken">
                    <h5 class="nm semibold">background6.jpg</h5>
                  </span>
                  <!--/ meta -->
                  <img class="lazyOwl" data-src="/image/background/400x400/background6.jpg" alt="Photo" width="100%" />
                </div>
                <!--/ media -->
              </div>
              <!--/ thumbnail #6 -->
              <!-- thumbnail #7 -->
              <div class="item thumbnail">
                <!-- media -->
                <div class="media">
                  <!-- toolbar overlay -->
                  <div class="overlay">
                    <div class="toolbar">
                      <a href="#" class="btn btn-danger" title="love this picture">
                        <i class="ico-search"></i>
                      </a>
                    </div>
                  </div>
                  <!--/ toolbar overlay -->
                  <!-- meta -->
                  <span class="meta bottom darken">
                    <h5 class="nm semibold">background7.jpg</h5>
                  </span>
                  <!--/ meta -->
                  <img class="lazyOwl" data-src="/image/background/400x400/background7.jpg" alt="Photo" width="100%" />
                </div>
                <!--/ media -->
              </div>
              <!--/ thumbnail #7 -->
            </div>

            <article class="panel overflow-hidden">
              <!-- Comments -->
              <section class="panel-body">
                <h4 class="mt0 mb15 text-primary">Comments (6)</h4>
                <div class="media-list">
                  <div class="media">
                    <div class="media-left">
                      <a href="javascript:void(0);">
                        <img src="/image/avatar/avatar1.jpg" class="media-object img-circle" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="media-text">
                        <h5 class="semibold mt0 mb5 text-default">Erica Jacobson</h5>
                        <p class="mb5">Lorem ipsum dolor sit amet, eu vide nusquam sed, sit et vitae vocent. At est possit numquam percipit. Vidisse aliquip comprehensam pro cu, vim ex dolore docendi.</p>
                        <!-- meta icon -->
                        <p class="mb0">
                          <span class="media-meta">Aug 26, 2013</span>
                          <span class="mr5 ml5 text-muted">&#8226;</span>
                          <a href="javascript:void(0);" class="media-meta text-default" data-toggle="tooltip" title="Reply">
                          </a>
                        </p>
                        <!--/ meta icon -->
                      </div>
                    </div>
                  </div>
                  <div class="media">
                    <div class="media-left">
                      <a href="javascript:void(0);">
                        <img src="/image/avatar/avatar4.jpg" class="media-object img-circle" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="media-text">
                        <h5 class="semibold mt0 mb5 text-accent">Colt Jenkins</h5>
                        <p class="mb5">Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros.</p>
                        <!-- meta icon -->
                        <p class="mt5 mb0">
                          <span class="media-meta">Nov 11, 2014</span>
                          <span class="mr5 ml5 text-muted">&#8226;</span>
                          <a href="javascript:void(0);" class="media-meta text-default" data-toggle="tooltip" title="Reply">
                          </a>
                        </p>
                        <!--/ meta icon -->
                      </div>
                    </div>
                  </div>
                  <div class="media">
                    <div class="media-left">
                      <a href="javascript:void(0);">
                        <img src="/image/avatar/avatar5.jpg" class="media-object img-circle" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="media-text">
                        <h5 class="semibold mt0 mb5 text-default">Hermione Mayo</h5>
                        <p class="mb5">Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis</p>
                        <!-- meta icon -->
                        <p class="mt5 mb0">
                          <span class="media-meta">Aug 2, 2014</span>
                          <span class="mr5 ml5 text-muted">&#8226;</span>
                          <a href="javascript:void(0);" class="media-meta text-default" data-toggle="tooltip" title="Reply">
                          </a>
                        </p>
                        <!--/ meta icon -->
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- Comments -->
              <!-- Post Comments -->
              <section class="panel-footer pb0">
              <div class="row">
                <h4 class="mt0 mb15 text-primary">Post your comment</h4>
               </div>
                <!-- form -->
                <form class="form-horizontal">
                  <div class="form-group message-container">
                    <div class="alert alert-dismissible alert-info">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4 class="mt0 mb5 semibold">Info</h4>
                      <p class="nm">This is the alert space. (Must be logged in to comment)</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Your comment</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" rows="6" name="comment"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="reset" class="btn btn-default">Reset</button>
                      <button type="submit" class="btn btn-success">
                        <span class="ladda-label">Submit</span>
                      </button>
                    </div>
                  </div>
                </form>
                <!-- form -->
              </section>
              <!--/ Post Comments -->
            </article>
            <!--/ Blog post #1 -->
          </div>
          <!--/ END left / top side -->

        </div>
        <!--/ END Row -->
      </div>

@stop