@extends('layouts.frondend.menu_footer')

@section('title', 'Home')

@section('content')


        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

               @foreach ($products as $product)
                    <!-- Single Catagory -->
                    <div class="single-products-catagory clearfix">
                        <a href="{{ route('product.show', $product) }}">
                            <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->image }}">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>FCFA {{ $product->price }}</p>
                                <h4>{{ $product->title }}</h4>
                            </div>
                        </a>
                    </div>
               @endforeach
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->



@endsection
