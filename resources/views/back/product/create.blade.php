@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Créer un produit</h1>
            </div>
            <div class="col-md-12">
                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input id="name" class="form-control" name="name" type="text">
                        @if($errors->has('name')) <span class="alert-danger">{{$errors->first('name')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <input id="description" class="form-control" name="description" type="text">
                        @if($errors->has('description')) <span class="alert-danger">{{$errors->first('description')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input id="price" class="form-control" name="price" type="text">
                        @if($errors->has('price')) <span class="alert-danger">{{$errors->first('price')}}</span>@endif
                    </div>
                    <div class="imgInput">
                        <h2>Image : </h2>
                        <input id="picture" type="file" name="picture">
                        @if($errors->has('picture')) <span class="alert-danger">{{$errors->first('picture')}}</span>@endif
                    </div>
                    <div class="form-group custom-radio">
                        <h2>Status : </h2>
                        <input type="radio" name="status" value="published"> Published
                        <input type="radio" name="status" value="unpublished"> Unpublished
                        @if($errors->has('status')) <span class="alert-danger">{{$errors->first('status')}}</span>@endif
                    </div>
                    <div class="form-group custom-radio">
                        <input type="radio" name="sales" value="sale"> En solde
                        <input type="radio" name="sales" value="standard"> Standard
                        @if($errors->has('sales')) <span class="alert-danger">{{$errors->first('sales')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="reference">Référence :</label>
                        <input id="reference" class="form-control" name="reference" type="text">
                        @if($errors->has('reference')) <span class="alert-danger">{{$errors->first('reference')}}</span>@endif
                    </div>
                    @forelse($categories as $id => $name)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="categorie_id" id="categories{{$id}}" value="{{$id}}">
                            <label class="form-check-label" for="categorie{{$id}}">{{$name}}</label>
                            @if($errors->has('categorie_id')) <span class="alert-danger">{{$errors->first('categorie_id')}}</span>@endif
                        </div>
                    @empty
                    @endforelse
                    <br>
                    @forelse($sizes as $id => $name)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="sizes[]" id="sizes{{$id}}" value="{{$id}}">
                            <label class="form-check-label" for="size{{$id}}">{{$name}}</label>
                        </div>
                    @empty
                    @endforelse
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection