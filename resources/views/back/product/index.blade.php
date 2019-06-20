@extends('layouts.master')

@section('content')
    <div class="col-md-12 text-right">
        <a href="{{route('products.create')}}" class="addNew"><button class="btn btn-outline-primary">Nouveau</button></a>
    </div>
    <table class="table table-striped adminProductInfo">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>État</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{ucfirst($product->categorie->name?? 'aucune catégorie')}}</td>
                <td>{{$product->price}} €</td>
                <td>{{$product->status}}</td>
                <td><a href="{{route('products.edit', $product->id)}}" class="btn btn-outline-primary">Modifier</a></td>
                <td>
                    <form class="delete" method="POST" action="{{route('products.destroy', $product->id)}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input class="btn btn-outline-danger" type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        @empty
            Aucun titre
        @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection