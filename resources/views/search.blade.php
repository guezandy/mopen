@extends('layout')

@section('content')
<div class="page-header page-header-block">
  <div class="page-header-section">
    <h4 class="title semibold">People</h4>
  </div>
  <div class="page-header-section">
    <div class="row toolbar">
      <div class="col-md-6 col-md-offset-6">
        <div class="has-icon">
          <input type="search" class="form-control" name="shuffle-filter" id="shuffle-filter" placeholder="New search">
          <i class="ico-search form-control-icon"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
@for($i = 0; $i < 5; $i++)
<div class="col-xs-12 col-md-6 col-lg-4">
<!-- START Widget Panel -->
<div class="widget panel">
  <!-- panel body -->
  <div class="panel-body">
    <ul class="list-table">
      <li style="width:70px;">
        <img class="img-circle img-bordered" src="../../image/avatar/avatar1.jpg" alt="" width="65px" height="65px">
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
@endfor
</div>
<hr><hr>
<div class="row">
<div class="page-header page-header-block">
  <div class="page-header-section">
    <h4 class="title semibold">Posts</h4>
  </div>
  <div class="page-header-section">
    <!-- Toolbar -->
    <div class="toolbar">
      <div class="btn-group" id="shuffle-filter">
        <button type="button" class="btn btn-default" data-group="tag1">Tag1</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
        <button type="button" class="btn btn-default" data-group="tag2">Tag2</button>
      </div>
    </div>
    <!--/ Toolbar -->
  </div>
  <div class="page-header-section">
    <!-- Toolbar -->
    <div class="row toolbar clearfix">
      <div class="col-sm-6">
        <span class="toolbar-label semibold mr5">Sort : </span>
      </div>
      <div class="col-sm-6">
        <select class="form-control" id="shuffle-sort">
          <option value="">Algo</option>
          <option value="title">Rating</option>
          <option value="date-created">Date Created</option>
        </select>
      </div>
    </div>
    <!--/ Toolbar -->
  </div>
</div>
</div>
<div class="row">
<div class="row" id="shuffle-grid">
	@for($i = 0; $i < 10; $i++)
	<div class="col-md-3 shuffle" data-groups='["tag1"]' data-date-created="2014-01-02" data-title="{{$i}}">
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
		        <a href="javascript:void(0);" class="btn btn-default" title="love this post">
		          <i class="ico-save"></i>
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
		    <h5 class="semibold mt0 mb5">Post Title by: Username</h5>
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
	<!--/ thumbnail -->
	@endfor
	<div class="col-md-3 shuffle" data-groups='["tag2"]' data-date-created="2014-01-02" data-title="{{$i}}">
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
		        <a href="javascript:void(0);" class="btn btn-default" title="love this post">
		          <i class="ico-heart6"></i>
		        </a>
		      </div>
		    </div>
		    <!--/ toolbar overlay -->
		    <img data-toggle="unveil" src="../../image/background/400x250/placeholder.jpg" data-src="../../image/background/400x250/background13.jpg" alt="Cover" width="100%" />
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
</div>	
</div>



@endsection