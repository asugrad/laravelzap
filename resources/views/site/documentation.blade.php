@extends('layout.master')

@section('content')
  <div id="blue">
      <div class="container">
      <div class="row">
        <h3>Documentation</h3>
      </div><!-- /row -->
      </div> <!-- /container -->
  </div><!-- /blue -->


  <div class="container mtb">
   <div class="row">

     <div class="col-lg-8">
       <h3 class="ctitle">What you need to do to get Laravel Zap! running</h3>

       <ul>
         <li>Clone or download the repository.</li>
         <li>Go to your terminal and `cd` to the root of the site.</li>
         <li>Run `npm install && composer install && gulp`</li>
         <li>If you are using Laravel Valet, you are done! Just browse to the site.</li>
         <li>Create views, models, and controllers just like you usually do, then run `php artisan zap:build` to regenerate the site.</li>
       </ul>

     </div><! --/col-lg-8 -->


     <! -- SIDEBAR -->
     <div class="col-lg-4">

       <h4>Links</h4>
       <div class="hline"></div>
         <p><a target="_blank" href="https://github.com/asugrad/laravelzap"><i class="fa fa-angle-right"></i> Laravel Zap! GitHub Repo</a></p>
     </div>
   </div><! --/row -->
  </div><! --/container -->
@endsection
