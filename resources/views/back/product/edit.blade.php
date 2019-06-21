@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Modifier un produit</h1>
            </div>
            <div class="col-md-12">
                <form action="{{route('products.update', $products->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{$products->name}}">
                        @if($errors->has('name')) <span class="alert-danger">{{$errors->first('name')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <input id="description" class="form-control" name="description" type="text" value="{{$products->description}}">
                        @if($errors->has('description')) <span class="alert-danger">{{$errors->first('description')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input id="price" class="form-control" name="price" type="text" value="{{$products->price}}">
                        @if($errors->has('price')) <span class="alert-danger">{{$errors->first('price')}}</span>@endif
                    </div>
                    <div class="imgInput">
                        <h2>Image : </h2>
                        <input id="picture" type="file" name="picture">
                        @if($errors->has('picture')) <span class="alert-danger">{{$errors->first('picture')}}</span>@endif
                    </div>
                    <div class="">
                        <h2>Image associée : </h2>
                        @if($products->picture) <img width="200" src="{{asset('images/'.$products->picture)}}" alt="#"> @endif
                    </div>
                    <div class="form-group custom-radio">
                        <h2>Status : </h2>
                        <input type="radio" name="status" @if($products->status == 'published') checked @endif value="published"> <label for="status">Publié</label>
                        <input type="radio" name="status" @if($products->status == 'unpublished') checked @endif value="unpublished">  <label for="status">Non publié</label>
                        @if($errors->has('status')) <span class="alert-danger">{{$errors->first('status')}}</span>@endif
                    </div>
                    <div class="form-group custom-radio">
                        <input type="radio" name="sales" @if($products->sales == 'sale') checked @endif value="sale"> <label for="sales">En solde</label>
                        <input type="radio" name="sales" @if($products->sales == 'standard') checked @endif value="standard"> <label for="sales">Standard</label>
                        @if($errors->has('sales')) <span class="alert-danger">{{$errors->first('sales')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="reference">Référence :</label>
                        <input id="reference" class="form-control" name="reference" type="text" value="{{$products->reference}}">
                        @if($errors->has('reference')) <span class="alert-danger">{{$errors->first('reference')}}</span>@endif
                    </div>
                    @forelse($categories as $id => $name)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="categorie_id" id="categories{{$id}}"  @if(in_array($id, $products->categorie()->pluck('id')->all())) checked @endif value="{{$id}}">
                            <label class="form-check-label" for="categorie{{$id}}">{{$name}}</label>
                        </div>
                    @empty
                    @endforelse
                    @if($errors->has('categorie_id')) <span class="alert-danger">{{$errors->first('categorie_id')}}</span>@endif
                    <br>
                    @forelse($sizes as $id => $name)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="sizes[]" id="sizes{{$id}}"  @if(in_array($id, $products->size()->pluck('id')->all())) checked @endif  value="{{$id}}">
                            <label class="form-check-label" for="size{{$id}}">{{$name}}</label>
                        </div>
                    @empty
                    @endforelse
                    @if($errors->has('sizes')) <span class="alert-danger">{{$errors->first('sizes')}}</span>@endif
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Éditer</button>
                </form>
            </div>
        </div>
    </div>
@endsection