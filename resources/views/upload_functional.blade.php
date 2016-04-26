@extends('layout')

@section('content')
<form action="{{URL::Route('saveNewPost')}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="page-header page-header-block">
  <div class="page-header-section">
    <h4 class="title semibold">Upload a new post
    @if(isset($status))
      {{$status}}
     @endif 
    </h4>
  </div>
  <div class="page-header-section">
    <div class="row toolbar">
      <div class="col-md-6 col-md-offset-6">
      </div>
    </div>
  </div>
</div>
<div class="panel panel-default col-sm-4">
	<div class="form-group">
	    <div class="panel-heading col-md-12">
	      <h5 class="semibold text-primary nm">Describe your post</h5>
	      <!-- <p class="text-muted nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
	    </div>
	</div>
	<div class="panel-body form-horizontal form-bordered">
		<div class="form-group">
		    <label class="col-sm-3 control-label">UI type
		    	<span class="text-danger">*</span>
		    </label>
		    <div class="col-sm-9">
		      <select class="form-control" name="type" id="type" data-parsley-group="info" data-parsley-required>
		        <option value="">Please choose</option>
            @foreach($postTypes as $type)
              <option value="{{$type->value}}">{{$type->label}}</option>
            @endforeach
		      </select>
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
		      <select id="selectize-selectmultiple" name="tags" id="tags" class="form-control" placeholder="Select tags..." multiple>
		        <option value="">Select a tag...</option>
		         <optgroup label="Android">
		            <option value="AA">Custom Row Adapter</option>
		            <option value="AB">Custom Gridview</option>
		          </optgroup>
		         <optgroup label="IOS">
		            <option value="AC">Some ios coso</option>
		            <option value="AD">Magic</option>
		          </optgroup>  
		      </select>
		    </div>
		</div>
		<div class="form-group">
		    <label class="col-sm-3 control-label">Collaborators</label>
		    <div class="col-sm-9">
		      <select id="selectize-contact" class="form-control" name="collaborators" placeholder="Select contact..."></select>
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
        <label class="col-sm-3 control-label">Save info</label>
        <div class="col-sm-9">
          <button class="btn btn-success" type="submit">Save Description</button>
        </div>
      </div>
	</div>
</div>
</form>
<div class="col-sm-8">
<div class="panel panel-default">
  <div class="panel-heading col-sm-12 text-right">
  <div class="col-sm-2">
    <h3 class="panel-title">Screenshots</h3>
    {!! Form::open(array('files' => TRUE, 'action' => 'AppController@uploadResource')) !!}
    {!! csrf_field() !!}
  </div>

      <div class="col-sm-2">
        {!! Form::label('filelabel', 'Add screenshot') !!}
      </div>
      <div class="col-sm-2">
        {!! Form::file('file') !!}
      </div>
      <div class="col-sm-2">
        {!! Form::submit('Add file') !!}
      </div>

    {!! Form::close() !!}
    </div>
<!--     <form action="{{URL::Route('uploadResource')}}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="panel-toolbar text-right">
        <input type="file" name="files[]" multiple>
        <div class="btn-group">
          <button type="submit" class="btn btn-sm btn-default">Add</button>
        </div>
      </div>
    </form> -->
    <div class="owl-carousel" id="lazy-load">
    @foreach($resources as $res)
      <div class="item thumbnail">
        <!-- media -->
        <div class="media">
          <div class="overlay">
            <div class="toolbar">
              <a href="#" class="btn btn-danger" title="love this picture">
                <i class="ico-edit"></i>
              </a>
            </div>
          </div>
          <span class="meta bottom darken">
            <h5 class="nm semibold">background1.jpg</h5>
          </span>
          <!--/ meta -->
          <img class="lazyOwl" data-src="../../image/mockup/iphone-front.jpg" alt="Photo" width="100%" />
        </div>
      </div>
    @endforeach  
    </div>
</div>
</div>
</form>
@endsection

@section('code')
<div class="">
<form action="{{URL::Route('uploadCode')}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-sm-12 panel-heading">
		<h3 class="panel-title">Code stuff</h3>
		<div class="panel-toolbar text-right">
		  <div class="btn-group">
		    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Add new File
		      <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu dropdown-menu-right">
		      <li><a href="{{URL::Route('addCodeJava')}}">Java</a></li>
		      <li><a href="{{URL::Route('addCodeXML')}}">XML</a></li>
		    </ul>
		  </div>
      <button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
	<div class="col-sm-12">
	  <div class="col-sm-6">
    @if(count($left_code) > 0)
        <div class="row"> <!-- For sortable add sortable-panel here -->
          <div class="col-md-12 "> <!-- For sortable add sortable here -->
            <div class="panel panel-primary">
              <div class="panel-heading handle">
              	<div class="col-sm-9">
	              	<div class="col-sm-6">
        						<input type="text" class="form-control" <?php if($left_code[0]->file_name != '') { ?> value="<?php echo $left_code[0]->file_name;?>" <?php } else {?> value="foo.java" <?php } ?> id="java_file_1" name="java_file_1"> 
                    <input type="hidden" class="form-control" value="<?php echo $left_code[0]->code_id; ?>" name="java_codeid_1"> 
        					</div>
        					<div class="col-sm-6">
        						Current Syntax: <div>{{$left_code[0]->format}}</div>
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
						<textarea id="java_code_1" name="java_code_1">
{{$left_code[0]->code}}
						</textarea>
                </div>
                <textarea class="form-control form-control-minimal" name="java_description_1" id="java_description_1" rows="3" placeholder="Describe this file">
{{$left_code[0]->description}}
                </textarea>
              </div>
            </div>
          </div>
        </div> 
      @endif
      @if(count($left_code) > 1)  
        <div class="row"> <!-- For sortable add sortable-panel here -->
          <div class="col-md-12 "> <!-- For sortable add sortable here -->
            <div class="panel panel-primary">
              <div class="panel-heading handle">
              	<div class="col-sm-9">
	              	<div class="col-sm-6">
                    <input type="text" class="form-control" <?php if($left_code[1]->file_name != '') { ?> value="<?php echo $left_code[1]->file_name;?>" <?php } else {?> value="foo.java" <?php } ?> id="java_file_2" name="java_file_2"> 
                    <input type="hidden" class="form-control" value="<?php echo $left_code[1]->code_id; ?>" name="java_codeid_2"> 
        					</div>
					<div class="col-sm-6">
						Current Syntax: <div>{{$left_code[1]->format}}</div>
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
						<textarea id="java_code_2" name="java_code_2">
{{$left_code[1]->code}}
						</textarea>
                </div>
                <textarea class="form-control form-control-minimal" rows="3" name="java_description_2" placeholder="Describe this file">
{{$left_code[1]->description}}                  
                </textarea>
              </div>
            </div>
          </div>
        </div>  
        @endif     
    </div>    

    <div class="col-sm-6">
		<div class='col-sm-12'>
            <div class="panel panel-primary">
              <div class="panel-heading handle">
              	<div class="col-sm-9">
	              	<div class="col-sm-6">
						<input type="text" class="form-control" value="foo.xml" id="xml_file_1"> 
					</div>
					<div class="col-sm-6">
						Current Syntax: <div>application/xml</div>
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
						<textarea id="xml-code">
&lt;html style="color: green"&gt;
  &lt;!-- this is a comment --&gt;
  &lt;head&gt;
    &lt;title&gt;HTML Example&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    The indentation tries to be &lt;em&gt;somewhat &amp;quot;do what
    I mean&amp;quot;&lt;/em&gt;... but might not match your style.
  &lt;/body&gt;
&lt;/html&gt;
						</textarea>
                </div>
                <textarea class="form-control form-control-minimal" rows="3" placeholder="Describe this file"></textarea>
              </div>
            </div>
		</div>    

		<div class="col-sm-12">
			<p>Filename: 
				<input type="text" value="foo.js" id="mode"> <button type="button" onclick="change()">Change Syntax</button>
				Current Syntax: <span id="modeinfo">text/plain</span>
			</p>
			<form>
				<textarea id="code" name="code">
		This is the editor.
		// It starts out in plain text mode,
		#  use the control below to load and apply a mode
		  "you'll see the highlighting of" this text /*change*/.
import com.demo.util.MyType;
import com.demo.util.MyInterface;

public enum Enum {
  VAL1, VAL2, VAL3
}

public class Class<T, V> implements MyInterface {
  public static final MyType<T, V> member;
  
  private class InnerClass {
    public int zero() {
      return 0;
    }
  }

  @Override
  public MyType method() {
    return member;
  }

  public void method2(MyType<T, V> value) {
    method();
    value.method3();
    member = value;
  }
}
				</textarea>
			</form>
		</div>
	</div>
</div>	
</form>
</div>





<script>
	CodeMirror.modeURL = "../mode/%N/%N.js";
	var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
	  lineNumbers: true
	});
	var modeInput = document.getElementById("mode");
	CodeMirror.on(modeInput, "keypress", function(e) {
	  if (e.keyCode == 13) change();
	});
	function change() {
	  var val = modeInput.value, m, mode, spec;
	  if (m = /.+\.([^.]+)$/.exec(val)) {
	    var info = CodeMirror.findModeByExtension(m[1]);
	    if (info) {
	      mode = info.mode;
	      spec = info.mime;
	    }
	  } else if (/\//.test(val)) {
	    var info = CodeMirror.findModeByMIME(val);
	    if (info) {
	      mode = info.mode;
	      spec = val;
	    }
	  } else {
	    mode = spec = val;
	  }
	  if (mode) {
	    editor.setOption("mode", spec);
	    CodeMirror.autoLoadMode(editor, mode);
	    document.getElementById("modeinfo").textContent = spec;
	  } else {
	    alert("Could not find a mode corresponding to " + val);
	  }
	}

	var javaEditor = CodeMirror.fromTextArea(document.getElementById("java_code_1"), {
		lineNumbers: true,
		mode: "text/x-java"
	});
	var javaEditor2 = CodeMirror.fromTextArea(document.getElementById("java_code_2"), {
		lineNumbers: true,
		mode: "text/x-java"
	});
	var xmlEditor = CodeMirror.fromTextArea(document.getElementById("xml-code"), {
		lineNumbers: true,
		mode: "application/xml"
	});
</script>

@endsection









