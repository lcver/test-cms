<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="keywords" content="mitra prestasi abadi, mitra prestasi, mpa, mpagrup, mpagroup">
    <meta name="description" content="PT. Mitra Prestasi Abadi merupakan perusahaan pertama dari MITRA PRESTASI GROUP yang bergerak di bidang supplier perdagangan barang dan jasa yang berada di bawah naungan MITRA GROUP.">

    <title>We will be back with new and exciting features!</title>

    <link rel="icon" href="{{ asset(env('APP_FAVICON')) }}" type="image/ico" />
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap -->
    <link href="{{ asset('/maintenance/css/bootstrap.min.css') }}" rel="stylesheet">

    
    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>

    <!-- custom css -->
    <link href="{{ asset('/maintenance/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="se-pre-con"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header-logo-wrapper">
            <img src="{{ asset(env('APP_LOGO_IMAGE')) }}" alt="logo" title="logo" class="img-responsive center-block" style="max-width:300px !important;" />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
        <h1 class="text-center">We will be back with new and exciting features!</h1>
        <h3 class="text-center">Kami akan segera kembali dengan fitur-fitur baru dan menarik!</h3>
        </div>
      </div>
  
      <div class="row">
        <div class="col-md-12">
          <div id="counter_wrapper">
            <div class="text-center" id="counter"></div>
          </div>
        </div>
      </div>

      <!--<div class="text-center subscribe-form-wrapper">
        <form action="#" class="form-inline">
          <div class="form-group">
           <label for="subscriberName">name</label>
           <input type="text" name="subscriberName" class="center-block form-control" placeholder="name" />
          </div>

          <div class="form-group">
            <label for="subscriberEmail">email</label>
            <input type="email" name="subscriberEmail" class="center-block form-control form-subs-email" placeholder="email" />
          </div>

          <button type="submit" class="btn btn-default">Subscribe</button>
        </form>
      </div>-->

    <div class="row">
      <div class="col-md-12">
        <div class="social-media-wrapper text-center">
          <!--
		  <a href="#"><i class="fa fa-pinterest"></i></a>
          <a href="#"><i class="fa fa-google-plus-official"></i></a> 
          <a href="https://facebook.com/vickzkater" target="_blank"><i class="fa fa-facebook-official"></i></a>
          <a href="https://twitter.com/vickzkater" target="_blank"><i class="fa fa-twitter"></i></a>
		  <a href="https://instagram.com/vickzkater" target="_blank"><i class="fa fa-instagram"></i></a>
		  -->
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="text-center copyright">Copyright &copy; {{ date('Y') }} {{ env('APP_NAME') }} - Powered By {{ env('POWERED', 'Kinidi Tech') }}</div> 
      </div>
    </div>
    
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('/maintenance/js/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('/maintenance/js/bootstrap.min.js') }}"></script>

    <!-- fit text -->
    <script src="{{ asset('/maintenance/js/jquery.fittext.js') }}"></script>

    <!-- jquery countdown -->
    <script src="{{ asset('/maintenance/js/jquery.plugin.js') }}"></script>
    <script src="{{ asset('/maintenance/js/jquery.countdown.js') }}"></script>

    <!--placeholder -->
    <script src="{{ asset('/maintenance/js/jquery.placeholder.js') }}"></script>

    <script>
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });

    $(document).ready(function(){
        $("#counter").countdown({
        until: new Date({{ env('APP_MAINTENANCE_UNTIL') }}),
        format: 'dHMS'
    });

    $("#counter_wrapper").fitText(1.2, {
        minFontSize: '20px',
        maxFontSize: '50px'
        });
    });
    </script>
  </body>
</html>