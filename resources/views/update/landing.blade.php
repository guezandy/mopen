@extends('update.layout')

@section('main')
<div class="row text-center">
    <div class="col-lg-12">
      
        <!--activity title -->
        <h1>Mopen</h1>
        <h1 class="spacer">___</h1>
        
        <!--activity descritpion-->
        <p class="work">Maybe a jumbotron here?</p>
        <p class="work">A playgorund for mobile devs</p>
        <p>Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant , humanitatis multiformibus officiis retentabant.</p>
        <div class="row">
            <div class="col-sm-4">
            Persona 1
            </div>
            <div class="col-sm-4">
            Persona 2
            </div>
            <div class="col-sm-4">
            Persona 3
            </div>
        </div>
    </div>
</div>  
@endsection

@section('side')
<h1 class="visible-xs section-header">Last Posts</h1>
<h1 class="visible-xs text-center spacer">___</h1>

<!--work choice-->
<div class="item-choice">
    <a href="#" class="filter" data-filter="all">All</a> 
            <a href="#" class="filter" data-filter="Android">Android</a> 

    @foreach($all_tags as $tag)
        <a href="#" class="filter" data-filter="{{$tag->name}}">{{$tag->name}}</a> 

    @endforeach
    <hr>
</div>

<section class="row" id="Grid">
	@foreach($posts as $post)    
<?php 
  $img = Image::make($post['image']);
  $img->encode($post['res']->format);
  $type = $post['res']->format;
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img); 
?>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6 Android">
        <div class="panel panel-default item">
            <div class="panel-heading">
                <a href="{{ url('post', ['id' => $post['post']->post_id])}}">
                    <img class="img-responsive item-img" src="{!! $base64 !!}" alt="Work 2">
                </a>    
            </div>
            <div class="panel-body">
                <a href="{{ url('post', ['id' => $post['post']->post_id])}}"><h4 class="item-title">{{$post['post']->name}}</h4></a>
                <p class="item-category">
                    {{$post['user']}}
                </p>
                <p class="item-description">{{$post['post']->description}}</p>
                <hr>
                <p class="item-tags">
                    @foreach($post['tags'] as $tag)
                        {{$tag->name}} 
                    @endforeach
                </p>
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection