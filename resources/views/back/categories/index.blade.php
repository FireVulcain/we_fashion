@extends('layouts.master')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success customMessage">
            <p>{{Session::get('message')}}</p>
        </div>
    @endif
    <div class="col-md-12 text-right">
        <a href="{{route('categories.create')}}" class="addNew"><button class="btn btn-outline-primary">Nouveau</button></a>
    </div>
    <table class="table table-striped adminProductInfo">
        <thead>
        <tr>
            <th>Nom</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $categorie)
            <tr>
                <td>{{$categorie->name}}</td>
                <td><a href="{{route('categories.edit', $categorie->id)}}" class="btn btn-outline-primary">Modifier</a></td>
                <td>
                    <form class="delete" method="POST" action="{{route('categories.destroy', $categorie->id)}}">
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
@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection