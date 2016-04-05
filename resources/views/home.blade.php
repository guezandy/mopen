@extends('layout')

@section('content')
<section class="jumbotron jumbotron-bg7 jumbotron mt-20 mb20 mr-20 ml-20" data-stellar-background-ratio="0.4" style="min-height:320px;">
  <!-- pattern overlay -->
  <div class="pattern pattern2 overlay overlay-primary"></div>
  <!--/ pattern overlay -->
  <div class="container" style="padding-top:8%;">
    <h1 class="thin text-white text-center font-alt">Playground for mobile devs.</h1>
    <h4 class="thin text-white text-center">Algo mas cosa cosa</h4>
    <div class="text-center pt15">
    @if($user != 'none')
    <a href="{{URL::Route('upload')}}">
    	<button type="button" class="btn btn-primary pr15">
            <i class="ico-plus-circle"></i> Create new post
        </button>
    </a>
    @else
        <button type="button" class="btn btn-primary pr15">
                <i class="ico-plus-circle"></i> Signup
        </button>
        <button type="button" class="btn btn-primary pr15">
                <i class="ico-plus-circle"></i> Login
        </button>
    @endif    
    </div>
  </div>
</section>
<div class="page-header page-header-block">
  <div class="page-header-section">
    <h4 class="title semibold">Browse posts</h4>
  </div>
  <div class="page-header-section">
    <!-- Toolbar -->
    <div class="toolbar">
      <span class="toolbar-label semibold mr5">Tag Filter : </span>
      <div class="btn-group" id="shuffle-filter">
        <button type="button" class="btn btn-default" data-group="tag1">Tag1</button>
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
@stop