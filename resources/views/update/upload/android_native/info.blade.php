@extends('update.layout')

@section('main')
{!! Form::open(array('files' => TRUE, 'action' => 'AndroidNativeController@save')) !!}
{!! csrf_field() !!}

<!-- <p>Post object: {{$post}} </p>
<h5>PenID: {{Session::get('post_id')}} {{$post->post_id}}</h5> -->
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
  <div class="panel panel-success">
    <div class="panel-heading handle">
      <div class="col-sm-9">
        <div class="col-sm-6">
          <?php if($codes[$i]->file_name != '') { ?> {{$codes[$i]->file_name}}.{{$codes[$i]->format}} <?php } else {?> foo.{{$codes[$i]->format}} <?php } ?> 
          <input type="hidden" class="form-control" value="<?php echo $codes[$i]->code_id; ?>" name="<?php echo $codes[$i]->code_id; ?>:id">                 
        </div>
      </div>
      <div class="panel-toolbar text-right">
        <div class="option">
          <button type="button" class="btn up" data-toggle="panelcollapse">
            <i class="arrow"></i>
          </button>
          <button type="button" class="btn" data-toggle="panelremove" data-parent=".col-md-4">
            <i class="remove"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="panel-collapse pull out">
      <div class="panel-body">
        <textarea id="{{$codes[$i]->code_id}}:code" name="{{$codes[$i]->code_id}}:code">
{{$codes[$i]->code}}              
        </textarea>
      </div>
      <textarea class="form-control form-control-minimal" rows="3" name="{{$codes[$i]->code_id}}:description" id="{{$codes[$i]->code_id}}:description" placeholder="Describe this file">
{{$codes[$i]->description}}
      </textarea>
    </div>
  </div>
@endfor

@endsection

@section('side')
<h1 class="visible-xs section-header">Mobile Upload</h1>
<h1 class="visible-xs text-center spacer">___</h1>

<!--work choice-->
<div class="item-choice">
    <div class="input-group">
      Create a new post 
		{{Session::get('message')}}	
    </div><!-- /input-group -->
    <hr>
</div>

<div class="col-sm-12">
	<div class="panel-body form-horizontal form-bordered">
		<div class="form-group">
	    <label class="col-sm-3 control-label">UI type
	    	<span class="text-danger">*</span>
	    </label>
	    <div class="col-sm-9">
        Android Native
	    </div>
		</div>
		<div class="form-group">
	    <label class="col-sm-3 control-label">Title
	      <span class="text-danger">*</span>
	    </label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" name="title" id="title" data-parsley-group="info" <?php if(isset($post)) {?>value="<?php echo $post['name'] ?>"<?php } ?>>
	    </div>
		</div>
		<div class="form-group">
	    <label class="col-sm-3 control-label">Version Control link
	    </label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" name="vc" id="vc" data-parsley-group="info" data-parsley-type="url" <?php if(isset($post)) {?>value="<?php echo $post['vc_link'] ?>"<?php } ?>>
	    </div>
		</div>
		<div class="form-group">
	    <label class="col-sm-3 control-label">Select tags</label>
	    <div class="col-sm-9">
	      <select id="selectize-selectmultiple" name="tags[]" id="tags" class="form-control" placeholder="Select tags..." multiple>
	        <option value="">Select a tag...</option> <!-- TODO POssible options groups using optgroup tag -->
	          @foreach($tags_left as $tag)
	          	<option value="{{$tag->id}}">{{$tag->name}}</option>
	          @endforeach		
	      </select>
	    </div>
		</div>
		<div class="form-group">
	    <label class="col-sm-3 control-label">Collaborators</label>
	    <div class="col-sm-9">
	      <select id="selectize-selectmultiple2" class="form-control" name="collaborators[]" id="collaborators" placeholder="Select contact..." multiple>
            @foreach($collaborators_left as $user)
              <option value="{{$user->id}}">{{$user->full_name}}</option>
            @endforeach   	      	
	      </select>
	    </div>
		</div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
          <textarea class="form-control" name="description" id="description" rows="3">
<?php if(isset($post)) { echo $post['description']; } ?>
		  </textarea>
        </div>
      </div>
      <div class="form-group">
      	<ul>
      	   @for($i = 0; $i < count($images); $i++)
      	   	<li> Image {{$i}} <a class="btn btn-default">X</a></li>
      	   @endfor
      	</ul>
        <label class="col-sm-3 control-label">Image {{count($images)}}/5</label>
        <input type="file" name="file" id="file">
        <div class="col-sm-9 text-right">
        @if(count($images) < 5)
          <button class="btn btn-success" type="submit" value="upload_image" name="upload_image">Upload Image</button>
        @endif
        </div>
      </div>
      <div class="form-group">
      	@for($i = 0; $i < count($codes); $i++)
      	<div class="col-sm-12">
      		<div class="col-sm-3">{{$codes[$i]['format']}} :</div>
      		<div class="col-sm-6">
      			<input type="text" class="form-control" <?php if($codes[$i]->file_name != '') { ?> value="<?php echo $codes[$i]->file_name;?>" <?php } else {?> value="foo" <?php } ?> id="{{$codes[$i]->code_id}}:name" name="{{$codes[$i]->code_id}}:name">
      		</div>
      		<div class="col-sm-3">{{$codes[$i]->format}}</div>
      	</div>
      	@endfor
        <label class="col-sm-3 control-label">Code {{count($codes)}}/5</label>
        <div class="col-sm-9 text-right">
        @if(count($codes) < 5)
          <button class="btn btn-success" type="submit" value="add_java" name="add_java">Add Java</button>
          <button class="btn btn-success" type="submit" value="add_xml" name="add_xml">Add XML</button>
        @endif  
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-9 text-right">
          <button class="btn btn-success" type="submit" value="next" name="next">Save and Preview</button>
          <button class="btn btn-success" type="submit" value="upload" name="upload">Upload</button>
        </div>
      </div>
	  </div>
  </div>
{!! Form::close() !!}
<!-- </form> -->

<script>
	<?php if(count($codes) > 0) {?>
		var editor1 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[0]->code_id ?>:code"), {
			lineNumbers: true,
			mode: <?php if($codes[0]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
		});
	<?php } ?>
	<?php if(count($codes) > 1) { ?>
		var editor2 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[1]->code_id ?>:code"), {
			lineNumbers: true,
			mode: <?php if($codes[1]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
		});
	<?php } ?>
	<?php if(count($codes) > 2) { ?>
		var editor3 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[2]->code_id ?>:code"), {
		lineNumbers: true,
		mode: <?php if($codes[2]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
	});
	<?php } ?>	
	<?php if(count($codes) > 3) { ?>
		var editor4 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[3]->code_id ?>:code"), {
			lineNumbers: true,
			mode: <?php if($codes[3]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
		});
	<?php } ?>	
	<?php if(count($codes) > 4) { ?>
		var editor5 = CodeMirror.fromTextArea(document.getElementById("<?php echo $codes[4]->code_id ?>:code"), {
			lineNumbers: true,
			mode: <?php if($codes[4]->format == 'xml') { ?> "application/xml" <?php } else { ?> "text/x-java" <?php } ?>
		});
	<?php } ?>
</script>

@endsection