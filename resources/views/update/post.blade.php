@extends('update.layout')

@section('main')

<h1>{{$post->name ? $post->name : "Title"}}</h1>
<p>A post by: {{$user->full_name}}</p>

<h1 class="spacer">___</h1>
<p class="item-tags">
  In collaboration with: 
    @foreach($collaborators as $collaborator)
    <a href="">{{$collaborator->full_name}}</a>
    @endforeach
</p>
<p class="item-tags">
    @foreach($tags as $tag)
        <a href="#">{{$tag->name}}</a>
    @endforeach
</p>
<div class="owl-carousel" id="lazy-load">
   @for($i = 0; $i < count($images); $i++)
<?php 
  $img = Image::make($images[$i]);
  $img->encode($resources[$i]->format);
  $type = $resources[$i]->format;
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img); 
?>
  <div class="item thumbnail">
    <div class="media">
      <img class="lazyOwl" data-src="{!! $base64 !!}" alt="Photo" width="100%" />
    </div>
  </div>
@endfor  
</div>
    <p class="item-description"><strong>Description: </strong>{{$post->description}}</p>
<p class="item-tags">
    <a href="">LINK: {{$post->vc_link}}</a>
</p>
<hr>
@for($i = 0; $i < count($codes); $i++)
<div style='border: 1px solid;'>
    <p>{{$codes[$i]->file_name}}.{{$codes[$i]->format}}</p>
    <p>{{$codes[$i]->description}}</p>
    <textarea id="{{$codes[$i]->code_id}}:code" name="{{$codes[$i]->code_id}}:code">
        {{$codes[$i]->code}}              
    </textarea>
</div>
@endfor                  
@endsection

@section('side')
<h1 class="visible-xs section-header">Last Posts</h1>
<h1 class="visible-xs text-center spacer">___</h1>

<div class="item-choice">
    <a href="#" class="filter" data-filter="all">All</a> 
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


<script>
    <?php if(count($codes) > 0) {?>
        var editor1 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[0]->code_id ?>:code"), {
            lineNumbers: true,
            readOnly: true,
            mode: <?php if($codes[0]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
        });
    <?php } ?>
    <?php if(count($codes) > 1) { ?>
        var editor2 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[1]->code_id ?>:code"), {
            lineNumbers: true,
            readOnly: true,
            mode: <?php if($codes[1]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
        });
    <?php } ?>
    <?php if(count($codes) > 2) { ?>
        var editor3 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[2]->code_id ?>:code"), {
        lineNumbers: true,
        readOnly: true,
        mode: <?php if($codes[2]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
    });
    <?php } ?>  
    <?php if(count($codes) > 3) { ?>
        var editor4 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[3]->code_id ?>:code"), {
            lineNumbers: true,
            readOnly: true,
            mode: <?php if($codes[3]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
        });
    <?php } ?>  
    <?php if(count($codes) > 4) { ?>
        var editor5 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[4]->code_id ?>:code"), {
            lineNumbers: true,
            readOnly: true,
            mode: <?php if($codes[4]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
        });
    <?php } ?>
</script>

@endsection