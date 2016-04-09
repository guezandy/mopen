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
		Name<br>
		Description<br>
		Link to github<br>
		Other general information<br>

	Stackable panel elements to organize files<br>
		Group similar file extensions<br>
		Code prettify each <br>
	Multiselect for choosing tags<br>
	File upload drag and drop<br>
		Organizes java/xml files<br>
		Organizes resource files<br>
	Optional Description of each file's functionality<br>
	Upload images that show the thing working<br>
	Form wizard (step by step)<br>
	Carousel for images?<br>
	1. General info + tags + related to another posts (how)?<br>
	2. Upload code files + resources<br>
		Describe each file<br>
	3. Upload screenshots of it working or video<br>
		Describe each image<br>

	Single post page:<br>
		Left: <br>
			Stackable sortable code files<br>
			Stackable sortable resources<br>
		Right:<br>
			Screen shots of thing working<br>

		Like/Comment/Save<br>
		Comments section<br>
		Section for posts related to this one <br>

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
      <form class="form-horizontal form-bordered" action="" id="wizard-validate">
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
              <select class="form-control" name="type" id="select-type" data-parsley-group="info" data-parsley-required>
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
        </div>
        <!--/ Wizard Container 1 -->
        <!-- Wizard Container 2 -->
        <div class="wizard-title">Code</div>
    	<div class="wizard-container">
	        <!-- START Panel -->
	        <div class="panel panel-default" id="basic-uploader">
	          <!-- panel header/heading -->
	          <div class="panel-heading">
	            <h3 class="panel-title">File Uploader</h3>
	          </div>
	          <!--/ panel header/heading -->
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
<a href="#" id="xe_comments" data-type="textarea" data-pk="2">public class HelloWorld {
	String s = "yes";
}
</a>
						</pre>
                    </div>
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
	        </div>
	        <!--/ END Panel -->
    	</div>
        <!--/ Wizard Container 2 -->
        <!-- Wizard Container 3 -->
        <div class="wizard-title">Images</div>
        <div class="wizard-container">
          <div class="form-group">
            <div class="col-md-12">
              <h5 class="semibold text-primary nm">Proceed to payment</h5>
              <p class="text-muted nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Card number
              <span class="text-danger">*</span>
            </label>
            <div class="col-sm-5">
              <input type="text" name="card-number" class="form-control" data-parsley-group="payment" data-parsley-required data-mask="9999-9999-9999-9999">
            </div>
            <div class="col-sm-5">
              <input type="text" name="security-code" class="form-control" placeholder="Security code" data-parsley-group="payment" data-parsley-required data-parsley-maxlength="3" data-parsley-type="integer">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Name on card
              <span class="text-danger">*</span>
            </label>
            <div class="col-sm-5">
              <input type="text" name="card-holder" class="form-control" data-parsley-group="payment" data-parsley-required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Expiration
              <span class="text-danger">*</span>
            </label>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-4">
                  <select name="month" class="form-control" data-parsley-group="payment" data-parsley-required>
                    <option value="">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <select name="year" class="form-control" data-parsley-group="payment" data-parsley-required>
                    <option value="">Year</option>
                    <option value="1">2014</option>
                    <option value="2">2015</option>
                    <option value="3">2016</option>
                    <option value="4">2017</option>
                    <option value="5">2018</option>
                    <option value="6">2019</option>
                    <option value="7">2020</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Wizard Container 3 -->
        <!-- Wizard Container 4 -->
        <div class="wizard-title">Summary</div>
        <div class="wizard-container">
          <div class="form-group">
            <div class="col-md-12">
              <h5 class="semibold text-primary nm">Checkout</h5>
              <p class="text-muted nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Term Of Services</label>
            <div class="col-md-10">
              <span class="checkbox custom-checkbox">
                <input type="checkbox" name="checkbox-tos" id="checkbox-tos">
                <label for="checkbox-tos">&nbsp;&nbsp;I agree with this site <a href="javascript:void(0);">Term Of Services</a></label>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Notes</label>
            <div class="col-md-10">
              <textarea class="form-control" rows="5" placeholder="Add some notes!"></textarea>
            </div>
          </div>
        </div>
        <!-- Wizard Container 4 -->
      </form>
      <!--/ END Form Wizard -->
    </div>
    <!--/ END Panel -->
  </div>
</div>
<!--/ END row -->		
@stop

