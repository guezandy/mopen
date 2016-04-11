@extends('layout')

@section('content')

<!-- START Row -->
        <div class="row">
          <!-- Left side / top side -->
          <div class="col-md-9">
            <!-- START Timeline -->
            <ul class="timeline">
              <li class="header year ellipsis">Hoy</li>
              <li class="wrapper">
                <!-- START Events -->
                <ul class="events">
                  <li class="wrapper featured">
                    <div class="figure bgcolor-success">
                      <i class="ico-ladder"></i>
                    </div>
                    <!-- panel -->
                    <div class="panel">
                      <div class="panel-body">
                        <ul class="list-table">
                          <li class="text-left" style="width:60px;">
                            <img class="img-circle" src="../../image/avatar/avatar2.jpg" alt="" width="50px" height="50px">
                          </li>
                          <li class="text-left">
                            <p class="nm">
                              <span class="semibold">Tamara Moon</span> update project
                              <span class="text-accent bold">"Alpha Omega"</span> overall progress</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!--/ panel -->
                  </li>
                </ul>
                <!--/ END Events -->
              </li>
              <li class="header text-center semibold nm"><a href="javascript:void(0);">Load more</a></li>
            </ul>
            <!--/ END Timeline -->
          </div>
          </div>

@endsection