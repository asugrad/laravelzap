@extends('layout.master')

@section('content')
  <div id="blue">
    <div class="container">
      <div class="row">
        <h3>About Laravel Zap!</h3>
      </div><!-- /row -->
      </div> <!-- /container -->
  </div><!-- /blue -->

   <div class="container mtb">
    <div class="row">

      <div class="col-lg-8">

        <h3 class="ctitle">Why I created this</h3>
        <p>I always want a fast-loading site with as few (or no) external
          dependencies that
          could potentially bring a site down. I also wanted something that
          is simple to deploy, maintain, and manage, but I did not
          want to give up using Laravel. I looked at <a href="https://jigsaw.tighten.co">Jigsaw</a>
          (which is really great by the way), but it was not exactly what I
          was looking for. And this might not be what I am looking for either.
          But I am going to keep working on it until it is.
        </p>

        <h4>Where it is going</h4>
        <p>
          I think the application has potential for integration with a flat file database.
          I am researching that now. If I do that, I will might look at building
          an admin in order to help manage it. But I trying to keep this thing
          pretty simple. I also want to create a Vue boilerplate app with a Lumen backend. Just trying
          to find the time...
        </p>

      </div><! --/col-lg-8 -->


      <! -- SIDEBAR -->
      <div class="col-lg-4">

        <h4>Links</h4>
        <div class="hline"></div>
          <p><a href="target="_blank" href="https://github.com/asugrad/laravelzap"><i class="fa fa-angle-right"></i> Laravel Zap! GitHub Repo</a></p>
      </div>
    </div><! --/row -->
   </div><! --/container -->
@endsection
