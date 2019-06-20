@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Modifier une catégorie</h1>
            </div>
            <div class="col-md-12">
                <form action="{{route('categories.update', $categories->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{$categories->name}}">
                    </div>
                    <button style="" class="btn btn-outline-primary" type="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection