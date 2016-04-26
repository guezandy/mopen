@extends('update.layout')

@section('main')

<h1>Project title</h1>
<!--<h1 class="spacer">___</h1>-->
<p class="item-tags">
    <a href="#">illustration</a> ,
    <a href="#">graphic design</a> ,
    <a href="#">website</a>
</p>
<p class="actions">
    <a href="#">Like</a>
</p>
<img src="update/img/project/project-1/desktop-blog.jpg" alt="" class="img-responsive">
<p class="item-description"><strong>Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.</strong></p>
<p>Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant.</p>
<p>Nemo quaeso miretur, si post exsudatos labores itinerum longos congestosque adfatim commeatus fiducia vestri ductante barbaricos pagos adventans velut mutato repente consilio ad placidiora deverti.</p>
<!--<hr> -->
<textarea id="java_code_1" name="java_code_1">
public Class algo {
    int x = 123;
    int y = 123;
}
</textarea>
<br>
<p>Nemo quaeso miretur, si post exsudatos labores itinerum longos congestosque adfatim commeatus fiducia vestri ductante barbaricos pagos adventans velut mutato repente consilio ad placidiora deverti.</p>
<textarea id="java_code_2" name="java_code_2">
public Class algo {
    int x = 123;
    int y = 123;
}
</textarea>

<!--navigation
<ul class="pager">
    <li class="previous disabled"><a href="#">&lt; Prev</a></li>
    <li class="next"><a href="#">Next &gt;</a></li>
</ul>
<hr>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <h3 class="share">Share</h3>    
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-right">
        <a href="#"><img class="social" src="update/img/icon/icon-mail.png" alt="Mail"></a>
        <a href="#"><img class="social" src="update/img/icon/icon-facebook.png" alt="Facebook"></a>
        <a href="#"><img class="social" src="update/img/icon/icon-twitter.png" alt="Twitter"></a>
        <a href="#"><img class="social" src="update/img/icon/icon-google.png" alt="Google plus"></a>    
    </div>
</div> -->
     
<script>
    var javaEditor1 = CodeMirror.fromTextArea(document.getElementById("java_code_1"), {
        lineNumbers: true,
        mode: "text/x-java",
        readOnly: true
    });
</script>      
<script>
    var javaEditor2 = CodeMirror.fromTextArea(document.getElementById("java_code_2"), {
        lineNumbers: true,
        mode: "text/x-java",
        readOnly: true
    });
</script>                      
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