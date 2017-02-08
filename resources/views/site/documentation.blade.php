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
     <div class="page-wrapper">

         <div class="doc-wrapper">
             <div class="container">
                 <div class="doc-body">
                     <div class="doc-content">
                         <div class="content-inner">
                             <section id="download-section" class="doc-section">
                                 <h2 class="section-title">Download</h2>
                                 <div class="section-block">
                                     <p>
                                       You can clone it from the <a href="https://github.com/asugrad/laravelzap">Github</a> repo:
                                     </p>
                                     <div class="code-block">
                                         <p><code>git clone git@github.com:asugrad/laravelzap.git</code></p>
                                     </div><!--//code-block-->
                                     <p>
                                       Or you can download the master branch;
                                     </p>
                                     <a href="https://github.com/asugrad/laravelzap/archive/master.zip" class="btn btn-info" target="_blank"><i class="fa fa-download"></i> Download Laravel Zap<i class="fa fa-bolt" aria-hidden="true"></i></a>
                                 </div>
                             </section><!--//doc-section-->
                             <section id="installation-section" class="doc-section">
                                 <h2 class="section-title">Installation</h2>
                                 <div id="step1"  class="section-block">
                                   <div class="callout-block callout-info">
                                       <div class="icon-holder">
                                           <i class="fa fa-info-circle"></i>
                                       </div><!--//icon-holder-->
                                       <div class="content">
                                           <h4 class="callout-title">Achtung</h4>
                                           <p>
                                             I use <a href="https://laravel.com/docs/5.3/valet" target="_blank">Laravel Valet</a>
                                            as my development environment. These installation notes are based solely on
                                            getting the site running on Laravel Valet. I have not yet tested it on MAMP, WAMP,
                                            or Laravel Homestead though it might work perfectly fine on those environments.
                                           </p>
                                       </div><!--//content-->
                                   </div><!--//callout-block-->

                                     <h3 class="block-title">Step One</h3>
                                     <p>
                                       After you have downloaded or cloned the repo, go into your terminal and `cd`
                                       to the root of the site. Then execute the following commands to set up the site.
                                     </p>
                                     <div class="code-block">
                                         <p><code>npm install</code></p>
                                         <p><code>composer install</code></p>
                                     </div><!--//code-block-->
                                 </div><!--//section-block-->
                                 <div id="step2"  class="section-block">
                                     <h3 class="block-title">Step Two</h3>
                                     <p>
                                       A '.env' file should have been created for you in the root of the site. If one
                                       was not created for you, simply rename the '.env.example' file to '.env'. Then run
                                       the artisan command to generate an application key for your application
                                     </p>
                                     <div class="code-block">
                                         <p><code>php artisan key:generate</code></p>
                                     </div><!--//code-block-->
                                     <p>Next you will need to edit the 'gulpfile.js' file in the root of your application.
                                      Change the following line to whatever your local development url is:
                                     </p>
                                     <div class="code-block">
                                       <code class="language-javascript" style="padding:10px;">
                                         var localsite = 'YOURLOCALDEV';
                                       </code>
                                     </div><!--//code-block-->
                                     <p>
                                       BrowserSync will use this as a proxy to create a live-reloading development experience.
                                     </p>
                                 </div><!--//section-block-->
                                 <div id="step3"  class="section-block">
                                     <h3 class="block-title">Step Three</h3>
                                     <p>
                                       You are now ready to launch your local site. Run the following command from the
                                       terminal in the root of your site
                                     </p>
                                     <div class="code-block">
                                         <p><code>gulp watch</code></p>
                                     </div><!--//code-block-->
                                     <p>
                                       The site should open up at http://localhost:8080
                                     </p>
                                 </div><!--//section-block-->
                             </section><!--//doc-section-->

                             <section id="development" class="doc-section">
                                 <h3 class="block-title">Development Tips</h3>

                                 <div class="callout-block callout-success">
                                     <div class="icon-holder">
                                         <i class="fa fa-thumbs-up"></i>
                                     </div><!--//icon-holder-->
                                     <div class="content">
                                         <h4 class="callout-title">Using gulp watch</h4>
                                         <p>
                                           As long as 'gulp watch' is running, any changes you make to your blade, javascript, or SASS
                                           files, will force the open browser tab to refresh and display your changes. You can make
                                           changes on the fly and see your updates as you make them. This allows for truly rapid development,
                                         </p>
                                     </div><!--//content-->
                                 </div><!--//callout-block-->


                             </section><!--//doc-section-->

                             <section id="deploying" class="doc-section">
                                 <h3 class="block-title">Deploying the Site</h3>
                                 <p>
                                   You could simply build out, generate the site, and deploy only the 'public' folder.
                                   You would then just have to update the paths in the 'gulpfile.js' file to publish
                                   out your assets to the 'public' folder. I may someday soon make the 'public' folder
                                   the default path for the assets for the sake of simplicity (as is typical in most
                                   Laravel deployments).
                                 </p>
                                 <p>
                                   But until I make that happen, I just deploy the whole application (using Laravel Forge)
                                   and have the following setup for my deploy script:
                                 </p>
                                 <div class="code-block">
                                     <p><code>cd /home/forge/laravelzap.com<br>
                                     git pull origin master<br>
                                     composer install --no-interaction --prefer-dist --optimize-autoloader<br>
                                     gulp --production</code></p>
                                 </div><!--//code-block-->
                                 <p>
                                   The 'gulp --production' is the key. It regenerates the site and the assets.
                                 </p>
                             </section><!--//doc-section-->

                             <section id="video-section" class="doc-section">
                                 <h2 class="section-title">Video Tutorial (Coming Soon)</h2>
                                 <div class="section-block">
                                     <div class="row">
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                             <h6>Getting up and running with Laravel Zap<i class="fa fa-bolt" aria-hidden="true"></i></h6>
                                             <p>I am working on recording and editing a tutorial on how to get the site working. In <thead>
                                               meantime, enjoy a video from Feud Nation>
                                             </thead></p>
                                             <!-- 16:9 aspect ratio -->
                                             <div class="embed-responsive embed-responsive-16by9">
                                                 <iframe width="560" height="315" src="https://www.youtube.com/embed/a4Ds0BFCItE" frameborder="0" allowfullscreen></iframe>
                                             </div>
                                         </div>

                                     </div><!--//row-->
                                 </div><!--//section-block-->


                             </section><!--//doc-section-->
                         </div><!--//content-inner-->
                     </div><!--//doc-content-->
                     <div class="doc-sidebar hidden-xs">
                         <nav id="doc-nav">
                             <ul id="doc-menu" class="nav doc-menu" data-spy="affix">
                                 <li><a class="scrollto" href="#download-section">Download</a></li>
                                 <li>
                                     <a class="scrollto" href="#installation-section">Installation</a>
                                     <ul class="nav doc-sub-menu">
                                         <li><a class="scrollto" href="#step1">Step One</a></li>
                                         <li><a class="scrollto" href="#step2">Step Two</a></li>
                                         <li><a class="scrollto" href="#step3">Step Three</a></li>
                                     </ul><!--//nav-->
                                 </li>
                                 <li><a class="scrollto" href="#development">Development Tips</a></li>
                                 <li><a class="scrollto" href="#deploying">Deploying the Site</a></li>
                                 <li><a class="scrollto" href="#video-section">Video</a></li>
                             </ul><!--//doc-menu-->
                         </nav>
                     </div><!--//doc-sidebar-->
                 </div><!--//doc-body-->
             </div><!--//container-->
         </div><!--//doc-wrapper-->

     </div><!--//page-wrapper-->
   </div><! --/row -->
  </div><! --/container -->
@endsection
