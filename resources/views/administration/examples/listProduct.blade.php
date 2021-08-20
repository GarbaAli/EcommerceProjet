@extends('administration.examples.layout')
@section('contenu')
<h1>Liste des produits</h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>id</th>
        <th>Slug</th>
        <th>title</th>
        <th>Subtitle</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->slug}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->subtitle}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <button type="button" class="btn btn-success"> <a href="{{route('admin::update.product', ['id' => $product->id])}}">Edit</a></button>
                    <button type="button" class="btn btn-danger"> <a href="{{route('admin::delete.product', ['id' => $product->id])}}">Delete</a></button>
                    <button type="button" class="btn btn-default"> <a href="{{route('admin::view.product', ['id' => $product->id])}}">Detail</a></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
