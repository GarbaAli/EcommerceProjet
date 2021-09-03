@extends('administration.layout')

@section('contenu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher le produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin::products.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                {{ $product->slug }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $product->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subtitle:</strong>
                {{ $product->subtitle }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>first Image:</strong>
                <img src="{{ asset('storage/'. $product->image) }}" alt="Pas d'image" class="img-thumbnail" width="100" height="100">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Second Image:</strong>
                <img src="{{ asset('storage/'. $product->image_detail) }}" alt="Pas d'image" class="img-thumbnail" width="400" height="400">
            </div>
        </div>
    </div>
@endsection
