<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Delta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- styles -->
  <link rel="stylesheet" href="assets/css/fancybox/jquery.fancybox.css">
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-theme.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/slippry.css">
  <link href="assets/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/color/default.css">
  <!-- =======================================================
    Theme Name: Groovin
    Theme URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <script src="assets/js/modernizr.custom.js"></script>
  <script src="{{ asset('js/app.js') }}" ></script>

</head>

<body>
  <header>

    <div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Delta Tenja</a>
          </div>

          <div class="navigation">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <nav>
                <ul class="nav navbar-nav navbar-right">


                  <li class="current"><a href="#intro" data-toggle="collapse" data-target=".navbar-collapse.in">Home</a></li>
                  <li><a href="#about"  data-toggle="collapse" data-target=".navbar-collapse.in">Nagradni bodovi</a></li>
                  <li><a href="#works" data-toggle="collapse" data-target=".navbar-collapse.in">Igre</a></li>
                  <li><a href="#contact" data-toggle="collapse" data-target=".navbar-collapse.in">Pronađite nas</a></li>
                  @isset(auth()->user()->admin)
                  @if (auth()->user()->admin == 0)

                  <li>
                      <a class="external" href="{{ url('/admins') }}">Admins</a>
                  </li>

                  @endif
                  @endisset



                  @guest
                  <li>
                      <a href="{{ route('login') }}" class="external">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                  <li>
                      <a href="{{ route('register') }}" class="external">{{ __('Register') }}</a>
                  </li>
                  @endif
                  @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: inline-block;">
                              @csrf
                          </form>
                      </div>
                  </li>
                  @endguest
                </ul>
              </nav>
            </div>
            <!-- /.navbar-collapse -->
          </div>

        </div>
      </div>
    </header>


@yield('content')




  {{-- <footer>
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
              <ul class="social-network social-circle">
                <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
              <p>
                &copy; Groovin Theme - All right reserved
              </p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Groovin
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <footer>
        <div class="verybottom">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="aligncenter">
                  <ul class="social-network social-circle">
                    <li><a href="https://www.facebook.com/deltatenja/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/deltatenja/" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="aligncenter">
                  <p>Delta Tenja</p>
                  <p>
                    &copy; Groovin Theme - All right reserved
                  </p>
                  <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Groovin
                    -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x"></i></a>
      <!-- javascript -->
      <script src="assets/js/jquery-1.9.1.min.js"></script>
      <script src="assets/js/jquery.easing.js"></script>
      <script src="assets/js/classie.js"></script>
      <script src="assets/js/bootstrap.js"></script>
      <script src="assets/js/slippry.min.js"></script>
      <script src="assets/js/nagging-menu.js"></script>
      <script src="assets/js/jquery.nav.js"></script>
      <script src="assets/js/jquery.scrollTo.js"></script>
      <script src="assets/js/jquery.fancybox.pack.js"></script>
      <script src="assets/js/jquery.fancybox-media.js"></script>
      <script src="assets/js/masonry.pkgd.min.js"></script>
      <script src="assets/js/imagesloaded.js"></script>
      <script src="assets/js/jquery.nicescroll.js"></script>
      {{-- <script src="assets/js/jquery.nicescroll.min.js"></script> --}}
      <script src="assets/js/AnimOnScroll.js"></script>

      <script>
        new AnimOnScroll(document.getElementById('grid'), {
          minDuration: 0.4,
          maxDuration: 0.7,
          viewportFactor: 0.2
        });
      </script>
      <script>
        $(document).ready(function () {
          $('#slippry-slider').slippry(
            defaults = {
              transition: 'vertical',
              useCSS: true,
              speed: 5000,
              pause: 3000,
              initSingle: false,
              auto: true,
              preload: 'visible',
              pager: false,
            }
          )
        });
      </script>

      <script src="assets/js/custom.js"></script>

    </body>
    </html>
