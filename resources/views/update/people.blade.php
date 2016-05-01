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
{!! Form::open(array('action' => 'AppController@people')) !!}
{!! csrf_field() !!}
    <div class="input-group">
      <input type="text" class="form-control" name="search" id="search" placeholder="Search for your peeps">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span>
    </div><!-- /input-group -->
{!! Form::close() !!}    
    <hr>
</div>

<section class="row" id="Grid">
	@foreach($users as $user)    
    <div class="media">
        <div class="col-sm-3">
        <a href="{{ url('profile', ['username' => $user->username])}}">
            <img class="img-responsive" src="update/img/blog/avatar.jpg" alt="Coso"> 
        </a>    
        </div>
        <div class="col-sm-8">
            <div class="media-body">
                <h4 class="media-heading">{{$user->full_name}}</h4>
                <p class="article-category">{{$user->username}}<br>
                Posts: {{$user->posts}} | Stars: {{$user->stars}} | Followers: {{$user->followers}}</p>
            </div>
        </div>
        @if(Session::get('user_id'))
        <div class="col-sm-1">
            <a href="btn btn-info">Add</a>
        </div>
        @endif
    </div>
    @endforeach
</section>
@endsection