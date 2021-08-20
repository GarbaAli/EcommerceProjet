@extends('administration.examples.layout')
@section('contenu')
<h2>Information of the product {{$product->title}}</h2>
<p>
   <h4>Slug :</h4> {{$product->slug}}
</p>
<p>
    <h4>Subtitle :</h4> {{$product->subtitle}}
</p>
<p>
    <h4>Description :</h4> {{$product->description}}
</p>
<p>
    <h4>Price :</h4>  {{$product->price}} FCFA
</p>
<p>
    <h4>Image :</h4> <img src="{{ asset('frondend/img/bg-img/2.jpg') }}" alt="{{$product->image}}" width="100" height="100">
</p>
<p>
    <h4>Second Image :</h4> <img src="{{ asset('frondend/img/bg-img/2.jpg') }}" width="400" height="400" alt="{{$product->image_detail}}">
</p>

@endsection
