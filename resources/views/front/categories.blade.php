@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <div class="nbProducts">{{$products->total()}} produits</div>
        </div>
    </div>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card products" style="width: 18rem;">
                    <a href="/product/{{$product->id}}">
                        <img class="imgProduct" src="{{asset('images/'. $product->picture)}}" alt="">
                        <div class="card-body">
                            <p class="nameProduct card-text">{{$product->name}}</p>
                            <p class="priceProduct card-text">{{$product->price}} €</p>
                        </div>
                    </a>
                </div>
            </div>
        @empty
        @endforelse
    </div>
    <div class="row">
        <div class="col-md-12">
            {{$products->links()}}
        </div>
    </div>

@endsection