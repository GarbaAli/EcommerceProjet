@extends('administration.layout')

@section('contenu')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher la categorie</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin::categories.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $category->title }}
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $category->description }}
            </div>
        </div> --}}
    </div>
@endsection
