@extends('update.layout')

@section('main')
<div class="row text-center">
    <div class="col-lg-12">
      
        <!--activity title -->
        <img src="update/img/blog/avatar.jpg" alt="Work 2">
        <h1>Andrew Rodriguez</h1>
        <h5>@cosocoso</h5>
        <h1 class="spacer">___</h1>
        
        <!--activity descritpion-->
        <p class="work">This is your profile page</p>
        <p>Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant , humanitatis multiformibus officiis retentabant.</p>
    </div>
</div>  
@endsection

@section('side')
<h1 class="visible-xs section-header">Last Posts</h1>
<h1 class="visible-xs text-center spacer">___</h1>

<!--work choice-->
<div class="item-choice">
    <a href="#" class="filter" data-filter="all">All</a> 
    <a href="#" class="filter" data-filter="web-design">Android</a> 
    <a href="#" class="filter" data-filter="print">Grids</a> 
    <a href="#" class="filter" data-filter="illustration">Lists</a>
    <a href="#" class="filter" data-filter="illustration">Etc</a>
    <a href="#" class="filter" data-filter="illustration">Etc</a>
    <hr>
</div>

<section class="row" id="Grid">
	@for($i = 0; $i < 5; $i++)    
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 mix print">
        <div class="panel panel-default item">
            <div class="panel-heading">
                <a href="project-example.html">
                    <img class="img-responsive item-img" src="update/img/work/projet-example-6.jpg" alt="Work 2">
                </a>    
            </div>
            <div class="panel-body">
                <a href="project-example.html"><h4 class="item-title">Project Title</h4></a>
                <p class="item-category">Web design</p>
                <p class="item-description">Iam virtutem ex consuetudine vitae sermonisque nostri nostri nostri</p>
                <hr>
                <p class="item-tags">
                    <a href="#">illustration</a> ,
                    <a href="#">graphic design</a> ,
                    <a href="#">website</a>
                </p>
            </div>
        </div>
    </div>
    @endfor
</section>
@endsection