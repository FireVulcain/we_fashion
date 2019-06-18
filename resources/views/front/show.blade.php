@extends('layouts.master')

@section('content')
    <div class="row productPage">
        <div class="col-md-6">
            <div>
                <img class="imgProduct" src="{{asset('images/'. $products->picture)}}" alt="">
                <p class="descriptionProduct">{{$products->description}}</p>
            </div>
        </div>
        <div class="col-md-4">
            <h1 class="nameProduct">{{$products->name}}</h1>
            <p class="priceProduct">Prix : {{$products->price}} €</p>
            <p class="referenceProduct">Référence du produit : {{$products->reference}}</p>

            <p class="genderProduct">Vêtements pour {{$products->genre->name}}</p>

            <div class="form-group">
                <select name="sizesProduct" class="form-control sizesProduct">
                    <option value="default">Taille</option>
                    @forelse($products->size as $product)
                        <option value="{{$product->name}}">{{$product->name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            @if($products->sales === 'sale')
                <p class="salesProduct text-uppercase">En solde</p>
            @endif

            <a href="#" class="buyProduct btn btn-outline-primary">Acheter</a>
        </div>
    </div>
@endsection