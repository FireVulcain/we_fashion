@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Créer une catégorie</h1>
            </div>
            <div class="col-md-12">
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{old('name')}}">
                        @if($errors->has('name')) <span class="alert-danger">{{$errors->first('name')}}</span>@endif
                    </div>
                    <button style="" class="btn btn-outline-primary" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection