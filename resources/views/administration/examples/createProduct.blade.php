@extends('administration.examples.layout')
@section('contenu')
<div class="content-wrapper" style="padding-top: 0px;">
    <div class="row" style="margin-top: 10px;margin-bottom: 5px;">
        <div class="col-md-4">
            <div>
                @if(isset($produit))
                <h3>Modifier le produit</h3>
                @else
                    <h3>Enregister un produit</h3>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    @if(isset($produit) && !empty($produit->id))


                        <form {{ route('admin::updated.product.save') }} method="post" >
                    @else
                        <form {{ route('admin::create.product') }} method="post">
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @csrf
                    <input type="hidden" name="id" value="@php
                    if (isset($produit)) {
                        echo $produit->id;
                    }
                @endphp">
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" value="@php
                            if (isset($produit)) {
                                echo $produit->slug;
                            }
                        @endphp" name="slug" class="form-control" id="modal-slug">
                    </div>
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" value="@php
                        if (isset($produit)) {
                            echo $produit->title;
                        }
                    @endphp" name="title" class="form-control" id="modal-title">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Sous titre</label>
                        <input type="text" value="@php
                        if (isset($produit)) {
                            echo $produit->subtitle;
                        }
                    @endphp" name="subtitle" class="form-control" id="modal-subtitle">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" value="@php
                        if (isset($produit)) {
                            echo $produit->description;
                        }
                    @endphp" name="description" class="form-control" id="modal-description">
                    </div>
                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="text" value="@php
                        if (isset($produit)) {
                            echo $produit->price;
                        }
                    @endphp" name="price" old="price" class="form-control" id="modal-price">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" value="@php
                        if (isset($produit)) {
                            echo $produit->image;
                        }
                    @endphp" accept="image/png, image/jpeg" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="image_detail">Deuxieme Image</label>
                        <input type="file" class="form-control" value="@php
                        if (isset($produit)) {
                            echo $produit->image_detail;
                        }
                    @endphp" accept="image/png, image/jpeg" name="image_detail" id="image_detail">
                    </div>

                    <div class="col-md-4">
                        @if(isset($produit))
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                {{ __('Modifier') }}
                            </button>
                        @else
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                            {{ __('Enregister') }}
                        </button>
                        @endif

                    </div>
                </form>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection
