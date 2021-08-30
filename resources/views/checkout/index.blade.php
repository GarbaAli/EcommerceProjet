@extends('layouts.frondend.menu_footer')
@section('title', 'Zone de payage')

@section('content')

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2>Paiement</h2>
                    </div>
                    @php
                        $nom = '';
                        $email = '';
                        if (!empty( Auth::user())) {
                            $name = Auth::user()->name;
                            $email = Auth::user()->email;
                        }
                    @endphp
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" disabled value=" {{ $name }}" class="form-control" id="first_name" value="" placeholder="Nom" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input disabled value="{{ $email }}" type="email" class="form-control" id="email" placeholder="Email" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Total Panier</h5>
                    <ul class="summary-table">
                        <li><span>Sous-Total:</span> <span>FCFA <strong>{{ Cart::subtotal() }}</strong></span></li>
                        <li><span>Taxe (TVA):</span> <span>{{ Cart::tax() }}</span></li>
                        <li><span>Total:</span> <span>FCFA <strong>{{ Cart::total() }}</strong></span></li>
                    </ul>

                    <div class="payment-method">
                        <!-- Cash on delivery -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="cod" checked>
                            <label class="custom-control-label" for="cod">Payer a la livraison</label>
                        </div>
                        <!-- Paypal -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="paypal">
                            <label class="custom-control-label" for="paypal">MTN Money <img class="ml-15" src="{{ asset('frondend/img/core-img/mtn.jpg') }}" style="width: 25px" alt=""></label>
                        </div>
                          <!-- Paypal -->
                          <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="paypal">
                            <label class="custom-control-label" for="paypal">Orange Money <img class="ml-15" src="{{ asset('frondend/img/core-img/orange.jpeg') }}" style="width: 25px" alt=""></label>
                        </div>
                    </div>

                    <div class="cart-btn mt-100">
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <button class="btn btn-warning" type="submit">Je Paye</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
