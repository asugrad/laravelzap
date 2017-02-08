<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <meta name="description" content="A Laravel Powered Static Site Generator. Simply put: it generates static HTML files from your Laravel application.">

    <title>Laravel Zap!</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/storage/css/app.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
@include('layout.partials.nav')

<div class="fill-page">
  @yield('content')
</div>

<div id="footerwrap" class="footer navbar-fixed-bottom">
   <div class="row">
     <div class="col-lg-3 pull-right">
       <h5>Developed by Michael O'Neil</h5>
       <div class="hline-w"></div>

         <a href="mailto:info@laravelzap.com">info@laravelzap.com</a>

     </div>

   </div><! --/row -->
</div><! --/footerwrap -->
@include('layout.partials.js')
@include('layout.partials.ga')
</body>
</html>
