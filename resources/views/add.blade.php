@extends('layouts.base')

@section('title', 'Ajout')
    
@section('content')
<div class="container-lg">
    <form action="/add" method="POST">
        @csrf
        <div class="form-group-lg">
            <label for="titre">Titre du livre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="auteur">Auteur du livre</label>
            <select class="custom-select" name="auteur" required>
                <option value="" disabled selected>Sélectionner l'auteur</option>
                @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>            
        </div>

        <div class="form-group">
            <label for="description">Description du livre</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        
        <div class="form-group">
            <legend class="col-form-label">Genre :</legend>
            @foreach ($genres as $genre)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="genres[]" value="{{$genre->id}}">
                    <label class="form-check-label" for="genre{{$genre->id}}">{{$genre->name}}</label>
                </div>
            @endforeach
        </div>
    
        <div class="form-group">
            <label for="annee">Année de parution</label>
            <input type="number" name="annee" class="form-control" required>
        </div>
    
        <input type="submit" value="Ajouter" class="btn btn-outline-primary">
    </form>
</div>
@endsection
