<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="{{ asset(env('APP_FAVICON')) }}" type="image/{{ env('APP_FAVICON_TYPE', 'png') }}" />

    <title>{{ env('APP_NAME') }} Admin | @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{ asset('/admin/build/css/custom.css') }}" rel="stylesheet">

    <style>
    .scroll-top {
        width: 40px;
        height: 30px;
        position: fixed;
        bottom: 50px;
        right: 17px;
        display: none;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";       /* IE 8 */
        filter: alpha(opacity=50);  /* IE 5-7 */
        -moz-opacity: 0.5;          /* Netscape */
        -khtml-opacity: 0.5;        /* Safari 1.x */
        opacity: 0.5;               /* Good browsers */
    }
    .scroll-top i {
        display: inline-block;
        color: #FFFFFF;
    }
    </style>

    @yield('css')

    @yield('script-head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('admin_home') }}" class="site_title"><?php echo $app_logo; ?> <span>{{ env('APP_NAME') }}</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('/images/avatar.png') }}" alt="avatar" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>{{ ucwords(lang('welcome', $translation)) }},</span>
                <h2>{{ Session::get('admin')->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            @include('_template_adm.sidebar')

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="{{ ucwords(lang('profile', $translation)) }}" href="{{ route('admin_profile') }}">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="{{ ucwords(lang('go to website', $translation)) }}" href="{{ env('APP_URL') }}" target="_blank">
                  <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="{{ ucwords(lang('help', $translation)) }}" onclick="alert('{{ env('HELP') }}')">
                <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="{{ ucwords(lang('log out', $translation)) }}" href="{{ route('admin_logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
            
          </div>
        </div>

        @include('_template_adm.nav')

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; {{ date('Y') }} {{ env('APP_NAME') }}
            @if (env('POWERED'))
              - Powered By <a href="{{ env('POWERED_URL') }}">{{ env('POWERED') }}</a>
            @endif
          </div>
          <div class="clearfix"></div>
          
          @if (env('DISPLAY_SESSION', false))
            @include('_template_adm.debug')
          @endif
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
      <i class="fa fa-chevron-up"></i>
    </button>

    <!-- jQuery -->
    <script src="{{ asset('/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('/admin/vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{ asset('/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- bootstrap-progressbar -->
    <script src="{{ asset('/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

    @yield('script-sidebar')
    @yield('script')

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('/admin/build/js/custom.min.js') }}"></script>
    <!-- Custom Script -->
    <script src="{{ asset('/admin/js/vcustom.js') }}"></script>

    <script>
    $(document).ready(function () {
      $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
              $('.scroll-top').fadeIn();
          } else {
              $('.scroll-top').fadeOut();
          }
      });

      $('.scroll-top').click(function () {
          $("html, body").animate({
              scrollTop: 0
          }, 500);
          return false;
      });

      });
    </script>
  </body>
</html>