@extends('layouts.frondend.menu_footer')

@section('title', 'Detail du produit')

@section('content')
    

        
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                                <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $product->slug }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ asset('frondend/img/product-img/pro-big-1.jpg') }} ;">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{ asset('frondend/img/product-img/pro-big-2.jpg') }});">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{ asset('frondend/img/product-img/pro-big-1.jpg') }}">
                                            <img class="d-block w-100" src="{{ asset('frondend/img/product-img/pro-big-1.jpg') }}" alt="First slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{ asset('frondend/img/product-img/pro-big-2.jpg') }}">
                                            <img class="d-block w-100" src="{{ asset('frondend/img/product-img/pro-big-2.jpg') }}" alt="Second slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">FCFA {{ $product->price }}</p>
                                <a href="#">
                                    <h6>{{ $product->title }}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="review">
                                        <a href="#">{{ $product->subtitle }}</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>{{ $product->description }}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form action="{{ route('cart.store') }}" class="cart clearfix" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <input type="number" name="qte" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity">
                                    </div>
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn"> <i class="fa fa-cart"></i> Ajouter au panier</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->

@endsection