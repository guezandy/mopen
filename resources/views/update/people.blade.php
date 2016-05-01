@extends('update.layout')

@section('main')
<div class="row text-center">
    <div class="col-lg-12">
      
        <!--activity title -->
        <h1>Mopen</h1>
        <h1 class="spacer">___</h1>
        
        <!--activity descritpion-->
        <p class="work">A playgorund for mobile devs</p>
        <p>Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant , humanitatis multiformibus officiis retentabant.</p>
    
    </div>
</div>  
@endsection

@section('side')
<h1 class="visible-xs section-header">Last Posts</h1>
<h1 class="visible-xs text-center spacer">___</h1>

<!--work choice-->
<div class="item-choice">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for your peeps">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
    <hr>
</div>

<section class="row" id="Grid">
	@for($i = 0; $i < 5; $i++)    
    <div class="media">
        <div class="col-sm-3">
            <img class="img-responsive" src="update/img/blog/avatar.jpg" alt="Coso">     
        </div>
        <div class="col-sm-8">
            <div class="media-body">
                <h4 class="media-heading">Persons Name</h4>
                <p class="article-category">Persons handle<br>
                Posts: 5 | Stars: 6 | Followers: 40</p>
            </div>
        </div>
        <div class="col-sm-1">
            <a href="btn btn-info">Add</a>
        </div>
    </div>
    @endfor
</section>
@endsection