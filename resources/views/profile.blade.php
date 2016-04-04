@extends('layout')

@section('content')
<!-- START Row -->
<div class="row">
  <!-- Left Side / Top side -->
  <div class="col-md-3">
    <div class="panel panel-minimal nm">
      <div class="panel-body pt0 pb0">
        <ul class="list-table">
          <li style="width:55px;">
            <img class="img-circle" src="../../image/avatar/avatar2.jpg" alt="" width="45px" height="45px">
          </li>
          <li class="text-left">
            <h5 class="semibold ellipsis">
              Drew thang
              <br>
              <small class="text-muted">@drew</small>
            </h5>
          </li>
        </ul>
      </div>
      <ul class="nav nav-justified mt15">
        <li class="text-center">
          <h4 class="nm">12k</h4>
          <p class="nm text-muted">Posts</p>
        </li>
        <li class="text-center">
          <h4 class="nm">1853</h4>
          <p class="nm text-muted">Likes</p>
        </li>
        <li class="text-center">
          <h4 class="nm">3451</h4>
          <p class="nm text-muted">Followers</p>
        </li>
      </ul>
      <hr>
      <div class="panel-toolbar-wrapper">
        <div class="panel-toolbar">
          <h5 class="semibold nm text-info">
            <i class="ico-info2 mr5"></i>About</h5>
        </div>
        <div class="panel-toolbar text-right">
          <button type="button" class="btn btn-sm btn-default">
            <i class="ico-pencil7"></i>
          </button>
        </div>
      </div>
      <div class="panel-body pt0">
        <p class="semibold mb5">Bio</p>
        <ul class="list-unstyled mb10">
          <li>
            <i class="ico-briefcase text-muted mr5"></i> UI/UX Designer</li>
          <li>
            <i class="ico-graduation text-muted mr5"></i> Studied interface design</li>
          <li>
            <i class="ico-home4 text-muted mr5"></i> San Francisco</li>
        </ul>
      </div>
      <!--/ END Bio -->
      <hr>
      <!--horizontal line -->
      <!-- START Friend lists -->
      <div class="panel-toolbar-wrapper">
        <div class="panel-toolbar">
          <h5 class="semibold nm text-info">
            <i class="ico-users3 mr5"></i>Followers</h5>
        </div>
        <div class="panel-toolbar text-right">
          <button type="button" class="btn btn-sm btn-default">
            <i class="ico-plus"></i>
          </button>
        </div>
      </div>
      <div class="panel-body pt0">
        <div class="media-list media-list-contact">
          <a href="page-message-rich.html" class="media">
            <span class="media-left">
              <img src="../../image/avatar/avatar1.jpg" class="media-object img-circle" alt="">
            </span>
            <span class="media-body">
              <span class="media-heading">
                <span class="hasnotification hasnotification-success mr5"></span> Autumn Barker</span>
              <span class="media-meta">Sint Maarten</span>
            </span>
          </a>
          </a>
        </div>
        <p class="nm"><a href="javascript:void(0);" class="semibold">View all</a></p>
      </div>
      <!--/ END Friend lists -->
    </div>
  </div>
  <!--/ Left side / Top side -->
  <div class="col-md-9">
    <div class="row">
	@for($i = 0; $i < 10; $i++)    
		<div class="col-md-4 shuffle" data-groups='["tag1"]' data-date-created="2014-01-02" data-title="{{$i}}">
			<!-- thumbnail -->
			<div class="thumbnail thumbnail-album animation animating delay fadeInLeft">
			  <!-- media -->
			  <div class="media">
			    <!-- indicator -->
			    <div class="indicator">
			      <span class="spinner"></span>
			    </div>
			    <!--/ indicator -->
			    <!-- toolbar overlay -->
			    <div class="overlay">
			      <div class="toolbar">
			        <a href="javascript:void(0);" class="btn btn-default" title="view this post">
			          <i class="ico-search"></i>
			        </a>
			        @if($user != 'none')
			        <a href="javascript:void(0);" class="btn btn-default" title="love this post">
			          <i class="ico-heart6"></i>
			        </a>
			        @endif
			      </div>
			    </div>
			    <!--/ toolbar overlay -->
			    <img class="center img-responsive gridImage" data-toggle="unveil" src="../../image/mockup/iphone-front.jpg" data-src="../../image/mockup/iphone-front.jpg" alt="Cover" width="100%" />
			  </div>
			  <!--/ media -->
			  <!-- caption -->
			  <div class="caption">
			    <h5 class="semibold mt0 mb5">Post Title</h5>
			    <p class="text-muted mb5 ellipsis">Post DescriptionLorem ipsum dolor sit amet, consectetur adipisicing elit</p>
			    <p class="tag ellipsis">
			      <a href="javascript:void(0);">Tag1</a>&nbsp;
			      <a href="javascript:void(0);">Tag2</a>
			    </p>
			  </div>
			  <!--/ caption -->
			  <hr class="mt5 mb5">
			  <ul class="meta">
			    <li>
			      <div class="img-group img-group-stack">
			      @for($j = 0; $j < 3; $j++)
			        <img src="../../image/avatar/avatar7.jpg" class="img-circle" alt="" />
			      @endfor  
			        <span class="more img-circle">{{10-$i}}+</span>
			      </div>
			    </li>
			    <li>
			      <p class="nm"><a href="javascript:void(0);" class="semibold">{{10-$i+3}} people</a> love this</p>
			    </li>
			  </ul>
			</div>
		</div>
		@endfor
    </div>
  </div>
</div>
<!--/ END Row -->
@stop