@extends('layout')

@section('content')
        <!-- Page Header -->
        <div class="page-header page-header-block">
          <div class="page-header-section">
            <h4 class="title semibold">Upload coso</h4>
          </div>
        </div>
        <!-- Page Header -->
        <div class="col-sm-2">
Notes:<br>
	X-editable input fields<br>
		<strike>Name<br></strike>
		<strike>Description<br></strike>
		<strike>Link to github<br></strike>
		Other general information<br>

	Stackable panel elements to organize files<br>
		<strike>Group similar file extensions<br></strike>
		Code prettify each <br>
	<strike>Multiselect for choosing tags<br></strike>
	<strike>File upload drag and drop<br>
		Organizes java/xml files<br>
		Organizes resource files<br></strike>
	Optional Description of each file's functionality<br>
	<strike>Upload images that show the thing working<br></strike>
	Form wizard (step by step)<br>
	Carousel for images?<br>
	<strike>1. General info + tags + related to another posts (how)?<br></strike>
	<strike>2. Upload code files + resources<br></strike>
		<strike>Describe each file<br></strike>
	<strike>3. Upload screenshots of it working or video<br>
		Describe each image<br></strike>

	Single post page:<br>
		<strike>Componets: <br>
			Code files<br>
			resources files<br>
      Assets<br>
			Screen shots of thing working with descriptions<br></strike>
		Like/<strike>Comment</strike>/Save<br>
		<strike>Comments section<br></strike>
		<strike>Section for posts related to this one <br></strike>

JS FILES PER TYPE:<br>
	Android file upload looks for (.java/.xml/.png)<br>
</div>
<!-- START row -->
<div class="row">
  <div class="col-md-8">
    <!-- START Panel -->
    <div class="panel panel-default">
      <!-- panel heading/header -->
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="ico-tshirt mr5"></i>Share your code with the world</h3>
      </div>
      <!--/ panel heading/header -->
      <!-- START Form Wizard -->
      <form class="form-horizontal form-bordered" id="wizard-validate" action="{{URL::Route('uploadNewPost')}}" method="post">
        <!-- Wizard Container 1 -->
        <div class="wizard-title">Basic Info</div>
        <div class="wizard-container">
          <div class="form-group">
            <div class="col-md-12">
              <h5 class="semibold text-primary nm">Describe your post</h5>
              <p class="text-muted nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">UI type
              <span class="text-danger">*</span>
            </label>
            <div class="col-sm-8">
              <select class="form-control" name="type" id="type" data-parsley-group="info" data-parsley-required>
                <option value="">Please choose</option>
                <option value="1">Android (Native)</option>
                <option value="2">Android (Xamarian)</option>
                <option value="3">IOS (Objective-C)</option>
                <option value="4">IOS (Swift)</option>
                <option value="5">JS</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Title
              <span class="text-danger">*</span>
            </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="title" id="title" data-parsley-group="info">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Version Control link
            </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="vc" id="vc" data-parsley-group="info" data-parsley-type="url">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Description
            </label>
            <div class="col-sm-8">
              <textarea class="form-control" rows="3" name="description" id="description" data-parsley-group="info" ></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Select tags</label>
            <div class="col-sm-8">
              <select id="selectize-selectmultiple" name="tags" class="form-control" placeholder="Select tags..." multiple>
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
            <label class="col-sm-2 control-label">Collaborators</label>
            <div class="col-sm-8">
              <select id="selectize-contact" class="form-control" name="collaborators" placeholder="Select contact..."></select>
            </div>
          </div>
        </div>
        <!--/ Wizard Container 1 -->
        <!-- Wizard Container 2 -->
      <div class="wizard-title">Code</div>
    	<div class="wizard-container">
	        <!-- START Panel -->
	          <!-- panel body -->
	          <div class="panel-body">
	            <!-- error message -->
	            <div class="alert alert-info">This uploader will return an error since there is no upload logic. You need to code your own upload logic.</div>
	            <!-- The global progress bar -->
	            <div class="progress progress-sm">
	              <div class="progress-bar progress-bar-success"></div>
	            </div>
	            <!-- The fileinput-button span is used to style the file input field as button -->
	            <div class="mb15">
	              <a class="btn btn-primary fileinput-button">
	                <i class="glyphicon glyphicon-plus"></i>
	                <span>Add files...</span>
	                <!-- The file input field used as target for the file upload widget -->
	                <input type="file" name="files[]" multiple>
	              </a>
	            </div>
	            <div class="mb15">
	              <a class="btn btn-primary snippet-button">
	                <i class="glyphicon glyphicon-plus"></i>
	                <span>Add snippet...</span>
	                <!-- The file input field used as target for the file upload widget -->
	                <input type="file" name="files[]" multiple>
	              </a>
	            </div>
	            <!-- dropzone -->
	            <div class="dropzone row table-layout well mb0" style="box-shadow:none;border-style:dashed;height:200px;">
	              <div class="col-xs-11 text-center">
	                <h4 class="text-muted">
	                  <i class="ico-file-plus2 mr5"></i> Drag and drop your file here!</h4>
	              </div>
	            </div>
	        </div>
	          <!--/ panel body -->
	          <!-- file list -->
	          <!--SNIPPETS -->
	        <div class="col-sm-12">
	          <div class="col-sm-6">
                <!-- START panel -->
                <div class="panel panel-default">
                  <!-- panel heading/header -->
                  <div class="panel-heading">
                    <h3 class="panel-title">HelloWorld.java</h3>
                    <!-- panel toolbar -->
                    <div class="panel-toolbar text-right">
                      <!-- option -->
                      <div class="option">
                        <button type="button" class="btn up" data-toggle="panelcollapse">
                          <i class="arrow"></i>
                        </button>
                        <button type="button" class="btn" data-toggle="" data-parent=".col-md-6">
                          <i class="remove"></i>
                        </button>
                      </div>
                      <!--/ option -->
                    </div>
                    <!--/ panel toolbar -->
                  </div>
                  <!--/ panel heading/header -->
                  <!-- panel body with collapse capabale -->
                  <div class="panel-collapse pull out">
                    <div class="panel-body">
                      <a href="#" id="xe_comments" data-type="textarea" data-pk="1">awesome comment!</a>						
                    <pre class="prettyprint linenums">
                      <a href="#" id="xe_comments" data-type="textarea" data-pk="2">
public class HelloWorld {
	String s = "yes";
}
                      </a>
        						</pre>
                    </div>
                    <textarea class="form-control form-control-minimal" rows="3" placeholder="Describe this file"></textarea>
                  </div>
                  <!--/ panel body with collapse capabale -->
                </div>
                <!--/ END panel -->
                </div>
                <div class="col-sm-6">
                <!-- START panel -->
                <div class="panel panel-default">
                  <!-- panel heading/header -->
                  <div class="panel-heading">
                    <h3 class="panel-title">HelloWorld.xml</h3>
                    <!-- panel toolbar -->
                    <div class="panel-toolbar text-right">
                      <!-- option -->
                      <div class="option">
                        <button type="button" class="btn up" data-toggle="panelcollapse">
                          <i class="arrow"></i>
                        </button>
                        <button type="button" class="btn" data-toggle="" data-parent=".col-md-6">
                          <i class="remove"></i>
                        </button>
                      </div>
                      <!--/ option -->
                    </div>
                    <!--/ panel toolbar -->
                  </div>
                  <!--/ panel heading/header -->
                  <!-- panel body with collapse capabale -->
                  <div class="panel-collapse pull out">
                    <div class="panel-body">
						<pre class="prettyprint linenums">
							<?xml version="1.0" encoding="utf-8"?>
							<LinearLayout xmlns:android="http://schemas.android.com/apk/res/android"
							    android:layout_width="match_parent"
							    android:layout_height="wrap_content"
							    android:descendantFocusability="blocksDescendants"
							    android:orientation="horizontal" >
							    <CheckBox android:id="@+id/checkbox"
							        android:layout_width="wrap_content"
							        android:layout_height="wrap_content"
							        android:layout_gravity="center_vertical"
							        android:clickable="false" />
							    <TextView android:id="@+id/key"
							        android:layout_width="0dp"
							        android:layout_height="wrap_content"
							        android:layout_weight="8"
							        android:layout_gravity="center_vertical" />
							    <TextView android:id="@+id/size"
							        android:layout_width="0dp"
							        android:layout_height="wrap_content"
							        android:layout_weight="2"
							        android:layout_gravity="center_vertical"
							        android:gravity="right" />
							</LinearLayout>
						</pre>
                    </div>
                  </div>
                  <!--/ panel body with collapse capabale -->
                </div>
                <!--/ END panel -->
                </div>
			     </div>
	          <table class="table table-striped table-hovered upload-lists">
	            <tbody></tbody>
	          </table>
	          <h2>Code</h2>
	          <table class="table table-striped table-hovered upload-code">
	            <tbody></tbody>
	          </table>	
	          <h2>Res</h2>          
	          <table class="table table-striped table-hovered upload-res">
	            <tbody></tbody>
	          </table>	 
	          <h2>Assets</h2>         
	          <table class="table table-striped table-hovered upload-asset">
	            <tbody></tbody>
	          </table>
	        <!--/ END Panel -->
    	</div>
        <!--/ Wizard Container 2 -->
        <!-- Wizard Container 3 -->
        <div class="wizard-title">Images/Video</div>
          <div class="wizard-container">
            <div class="form-group">
              <div class="col-md-12">
                <h5 class="semibold text-primary nm">Describe you post woot</h5>
                <p class="text-muted nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
              <div class="mb15">
                <a class="btn btn-primary fileinput-button">
                  <i class="glyphicon glyphicon-plus"></i>
                  <span>Add files...</span>
                  <!-- The file input field used as target for the file upload widget -->
                  <input type="file" name="files[]" multiple>
                </a>
              </div>
            <div class="form-group">
              <div class="row">
              @for($i = 0; $i < 3; $i++)
                <div class="col-sm-4">
                  <!-- image post -->
                  <div class="panel">
                    <!-- User info -->
                    <ul class="list-table pa15">
                      <li class="text-left">
                        <textarea class="form-control form-control-minimal" rows="1" placeholder="Image Title"></textarea>
                      </li>
                      <li class="text-right" style="width:60px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-link dropdown-toggle text-default" data-toggle="dropdown">
                            <i class="ico-menu2"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);" class="text-danger">Delete image</a></li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                    <!--/ User info -->
                    <!-- Thumbnail -->
                    <div class="thumbnail thumbnail-album">
                      <!-- media -->
                      <div class="media">
                        <!-- indicator -->
                        <div class="indicator">
                          <span class="spinner"></span>
                        </div>
                        <!--/ indicator -->
                        <img data-toggle="unveil" src="{{asset('image/background/400x250/placeholder.jpg') }}" data-src="{{asset('image/background/400x250/background11.jpg') }}" alt="Cover" width="100%">
                      </div>
                      <!--/ media -->
                    </div>
                    <!--/ Thumbnail -->
                    <!-- Toolbar -->
                    <div class="panel-toolbar-wrapper">
                      <div class="panel-toolbar">
                        <input type="checkbox">
                        <a href="javascript:void(0);" class="semibold text-default">Main Image</a>
                        <span class="text-muted mr5 ml5">&#8226;</span>
                      </div>
                    </div>
                    <!--/ Toolbar -->
                    <!-- Comment box -->
                    <textarea class="form-control form-control-minimal" rows="3" placeholder="Describe this image"></textarea>
                    <!--/ Comment box -->
                  </div>
                </div>
                @endfor
              </div>
            </div>
          </div>
        <!--/ Wizard Container 3 -->
      </form>
      <!--/ END Form Wizard -->
    </div>
    <!--/ END Panel -->
  </div>
</div>
<!--/ END row -->		
@stop

