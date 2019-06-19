@extends('layouts.master')

@section('content')
    <div class="col-md-12 text-right">
        <a href="#" class="addNew"><button class="btn btn-primary">Nouveau</button></a>
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
                <td>
                    @if($product->status == 'published')
                        <button type="button" class="btn btn-success">published</button>
                    @else
                        <button type="button" class="btn btn-warning">unpublished</button>
                    @endif
                </td>
                <td><a href="#">Edit</a></td>
                <td>
                    <form class="delete" method="POST" action="#">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input class="btn-danger" type="submit" value="Delete"/>
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