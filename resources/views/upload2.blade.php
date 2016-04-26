@extends('layout')

@section('content')
<!-- Page Header -->
        <div class="page-header page-header-block">
          <div class="page-header-section">
            <h4 class="title semibold">Upload a post</h4>
          </div>
        </div>
        <!-- Page Header -->
        <!-- START row -->
        <div class="row">
          <div class="col-sm-6">
            <!-- section header -->
            <div class="section-header mb15">
              <h5 class="semibold">Code files</h5>
              <button class="btn btn-success" onClick="<?php echo $count++ ?>">Add new code file</button>
            </div>
            <!--/ section header -->
            


            <!-- START panel -->
            File saved already

            <div class="panel panel-default">
              <!-- panel heading/header -->
              <div class="panel-heading">
                <h3 class="panel-title">filename.java</h3>
                <div class="panel-toolbar text-right">
                  <!-- option -->
                  <div class="option">
                    <button type="button" class="btn demo" data-toggle="panelrefresh">
                      <i class="ico-edit"></i>
                    </button>
                    <button type="button" class="btn up" data-toggle="panelcollapse">
                      <i class="arrow"></i>
                    </button>
                    <button type="button" class="btn" data-toggle="panelremove" data-parent=".col-md-4">
                      <i class="remove"></i>
                    </button>
                  </div>
                  <!--/ option -->
                </div>
                <!--/ panel toolbar -->
              </div>
              <!--/ panel heading/header -->
              <!-- panel body -->
              <div class="panel-collapse pull out">
	              <div class="panel-body">
	                <pre class="prettyprint linenums">
&lt;ul class=&quot;panel-meta&quot;&gt;
&lt;li&gt;1059&lt;/li&gt;
&lt;li&gt;38&lt;/li&gt;
&lt;/ul&gt;
	                </pre>
	              </div>
              <!--/ panel body -->
              </div>
              <div class="panel-footer">
                Description: Lorem ipsum dolor sit amet, mei essent everti theophrastus an, accusam lucilius vis eu. In mei accusamus efficiendi mediocritatem, eos ex paulo complectitur.
              </div>
            </div>
            <!--/ END panel -->
            <!-- START panel -->
            New file
            @for($i = 0; $i < $count; $i++)
            <div class="panel panel-default">
              <!-- panel heading/header -->
              <div class="panel-heading">
                 <div class="panel-toolbar text-right">
                  <!-- option -->
	                  <div class="col-sm-9">
	                     <input type="text" class="form-control" placeholder="Filename">
					  </div>
		  			  <div class="option col-sm-3 text-right">
	                    <button type="button" class="btn up" data-toggle="panelcollapse">
	                      <i class="arrow"></i>
	                    </button>
	                    <button type="button" class="btn" data-toggle="panelremove" data-parent=".col-md-6">
	                      <i class="remove"></i>
	                    </button>
                 </div>
                  <!--/ option -->
                </div>
                <!--/ panel toolbar -->
              </div>
              <!--/ panel heading/header -->
              <!-- panel body -->
              <div class="panel-collapse pull out">
	              <div class="panel-body">
                      <textarea class="form-control" placeholder="ENTER CODE HERE" rows="3"></textarea>
	              </div>
              <!--/ panel body -->
              </div>
              <div class="panel-footer">
                      <textarea class="form-control" placeholder="ENTER DESCRIPTION OF CODE HERE" rows="3"></textarea>
              	<div class="text-right">
              		<button class="btn btn-info mt15">Save</button>
              	</div>
              </div>
            </div>
            @endfor
            <!--/ END panel -->
          </div>
          <div class="col-sm-6">
            <!-- section header -->
            <div class="section-header mb15">
              <h5 class="semibold">Resources possibility (accordian)</h5>
            </div>
            <!--/ section header -->
            <!-- panel group -->
            <div class="panel-group panel-group-compact" id="accordion2">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne1" class="collapsed">
                      <span class="plus mr5"></span> Group 1
                    </a>
                  </h4>
                </div>
                <div id="collapseOne1" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" class="collapsed">
                      <span class="plus mr5"></span> Group 2
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo2" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree3" class="collapsed">
                      <span class="plus mr5"></span> Group 3
                    </a>
                  </h5>
                </div>
                <div id="collapseThree3" class="panel-collapse collapse">
                  <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                  </div>
                </div>
              </div>
            </div>
            <!--/ panel group -->
          </div>
        </div>
        <!--/ END row -->
        <hr>

@endsection