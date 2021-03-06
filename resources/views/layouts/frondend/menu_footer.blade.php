<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('frondend/img/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('frondend/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('frondend/style.css') }}">
    @yield('extra-token')

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Faite votre recherche">
                            <button type="submit"><img src="{{ asset('frondend/img/core-img/search.png') }}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="{{ asset('frondend/img/core-img/logo2n.png') }}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="{{ asset('frondend/img/core-img/logo2n.png') }}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                @php
                    $email = '';
                    if (!empty( Auth::user())) {
                        $email = Auth::user()->email;
                    }
                @endphp
                <ul>
                    <li class="active"><a href="{{ url('/') }}">Accueil</a></li>
                    <li><a href="{{ route('product.shop') }}">Shop</a></li>
                    <li><a href="#">{{ $email}}</a></li>
                    {{-- <li><a href="#">Checkout</a></li> --}}
                </ul>
            </nav>

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="{{ route('cart.index') }}" class="cart-nav"><img src="{{ asset('frondend/img/core-img/cart.png') }}" alt=""> Panier <span>({{ Cart::count() }})</span></a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        @yield('content');

         <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('product.shop') }}">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cart.index') }}">Panier</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin::products.create') }}">Administration</a>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->


    <!-- Button trigger modal-->


  <!-- Modal: modalAbandonedCart-->
  <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading">Produit dans le panier
          </p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">

          <div class="row">
            <div class="col-3">
              <p></p>
              <p class="text-center"><i class="fa fa-shopping-cart fa-4x"></i></p>
            </div>

            <div class="col-9">
              <p>{{ session()->get('success') }}!</p>
              <p>Consulter votre panier pour plus de details!!</p>
            </div>
          </div>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!-- Modal: modalAbandonedCart-->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{ asset('frondend/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('frondend/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('frondend/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('frondend/js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('frondend/js/active.js') }}"></script>
    @if(session()->has('success'))
  <script type="text/javascript">
    // $( document ).ready(function() {
        $('#modalAbandonedCart').modal('toggle')
    // });
    </script>
  @endif

  @yield('extra-js')
</body>

</html>
