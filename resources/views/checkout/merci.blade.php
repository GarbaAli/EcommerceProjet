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
    <div  style="margin-left: 20%" class="main-content-wrapper d-flex clearfix">
    @foreach (Auth()->user()->orders as $order )
    <div class="card mt-50">
        <div class="card-header">
            Commande passé le {{ Carbon\carbon::parse($order->created_at)->format('d-m-Y') }} d'un montant de <strong>{{ $order->prix }} FCFA</strong>
        </div>
        <div class="card-body">
            <h4 style="text-align: center">2nCORPORATE VOUS REMERCI POUR VOTRE CONFIANCE</h4>
            <a class="btn btn-dark" href="{{ route('product.shop') }}">Accueil</a>
        </div>
    </div>
    @endforeach


    </div>
</body>
</html>