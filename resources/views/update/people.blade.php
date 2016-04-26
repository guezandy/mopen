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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mix print">
        <div class="panel panel-default item person">
            <div class="col-sm-3">
                <a href="project-example.html">
                    <img class="img-responsive item-img" src="update/img/blog/avatar.jpg" alt="Work 2">
                </a>    
            </div>
            <div class="col-sm-4">
                <a href="project-example.html"><h4 class="item-title">Andrew Rodriguez</h4></a>
                <p class="item-category">@cosocoso</p>
                <hr>
            </div>
            <div class="col-sm-4">
               Post: 12 | Stars: 34     
            </div>
            <div class="col-sm-1">
                <button class="btn btn-info">+</button>
            </div>
        </div>
    </div>
    @endfor
</section>
@endsection