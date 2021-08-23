@extends('layouts.frondend.menu_footer')

@section('title', 'Votre Panier')

@section('content')
    
    
        
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Votre panier</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>libelle</th>
                                <th>Prix</th>
                                <th>Qte</th>
                                <th>Retirer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Cart::content() as $product )
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="{{ asset('frondend/img/bg-img/cart3.jpg') }}" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>{{ $product->model->title }}</h5>
                                    </td>
                                    <td class="price">
                                        <span>FCFA {{ $product->model->price }}</span>
                                    </td>
                                    <td class="qty">
                                        <div class="qty-btn d-flex">
                                            <p>4</p>
                                        </div>
                                    </td>
                                    <td class="qty">
                                        <div class="qty-btn d-flex">
                                            <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-warning" type="submit">Delete<i style="color: red" class="fa fa-trush"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                              <div class="alert alert-dark">
                                <strong>Aucun!</strong> produit dans le panier <a href="{{ route('product.shop') }}" class="alert-link">Retour</a>.
                              </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                @if (Cart::count() > 0)
                    <div class="cart-summary">
                        <h5>Detail de la Commande</h5>
                        <ul class="summary-table">
                            <li><span>Sous-Total:</span> <span>FCFA <strong>{{ Cart::subtotal() }}</strong></span></li>
                            <li><span>Taxe (TVA):</span> <span>{{ Cart::tax() }}</span></li>
                            <li><span>Total:</span> <span>FCFA <strong>{{ Cart::total() }}</strong></span></li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <a href="{{ route('checkout.index') }}" class="btn amado-btn w-100">Passer a la Caisse</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

@endsection