@extends('layouts.base')

@section('title', 'Listing')
    
@section('content')

<table class="table w-75">
    <thead class="thead-light">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Auteur</th>
            <th>Genre</th>
            <th>Année de parution</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    @foreach ($books as $book)
    <tr>
        <td>{{ $book->titre}}</td>
        <td>{{ $book->description}}</td>
        <td>{{ $book->author->name}}</td>
        <td>
            @foreach ($book->genres as $genre)
                <li>{{ $genre->name}}</li>
            @endforeach
        </td>
        <td>{{ $book->année_de_parution}}</td>
        <td>               
            <button class="btn btn-outline-info" data-toggle="modal" data-target="#editBook" data-titre="{{$book->titre}}" data-auteur="{{$book->author->id}}" data-bookid="{{$book->id}}" data-description="{{ $book->description}}" data-genre="{{ $book->genres}}" data-annee="{{ $book->année_de_parution}}">Editer</button>
        </td>
        <td>
            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteBook" data-titre="{{$book->titre}}" data-auteur="{{$book->author->name}}" data-bookid="{{$book->id}}">X</button>
        </td>
    </tr>
    @endforeach
    <tr>
        <form action="/add" method="post">@csrf
            <td><input type="text" name="titre" class="w-100" placeholder="Titre" required></td>
            <td><input type="text" name="description" class="w-100" placeholder="Descrption" required></td>
            <td>
                <select class="custom-select" name="auteur" required>
                    <option value="" disabled selected>Sélectionner l'auteur : </option>
                    @foreach ($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="genre" class="w-100" placeholder="Genre" required></td>
            <td><input type="number" name="annee" class="w-100" placeholder="Année de parution" required></td>
            <td colspan="2" class="no-vertical"><button type="submit" class="w-100 btn-outline-primary">Ajouter</td>
        </form>
    </tr>
</table>

  {{-- DELETE MODAL --}}

  <div class="modal" id="deleteBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredLabel">Titre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="title">Titre : {{ $book->titre}}</p>
                <p class="author">De : {{ $book->auteur}}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form action="/supp" method="post">
                    @csrf
                    <input type="number" name="id" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-danger">Oui</button>
                </form>        
            </div>
        </div>
    </div>
</div>

{{-- UPDATE MODAL --}}

<div class="modal" id="editBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/update" method="post" class="d-flex flex-column py-3">@csrf
                    <input type="number" class="py-2" name="id" value="" hidden>
                    <label for="titre">Titre :</label>
                    <input type="text" class="py-2" name="titre" value="" required>
                    <div class="form-group">
                        <label for="auteur">Auteur du livre</label>
                        <select class="custom-select" name="auteur" required>
                            <option value="" disabled selected>Sélectionner l'auteur :</option>
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}"> {{$author->name}} </option>
                            @endforeach
                        </select>            
                    </div>
                    <label for="description">Description :</label>
                    <input type="text" class="py-2" name="description" value="" required>
                    <div class="form-group" id="check">
                        <legend class="col-form-label">Genre :</legend>
                        @foreach ($genres as $genre)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="genres[]" value="{{$genre->id}}">
                                <label class="form-check-label" for="genre{{$genre->id}}">{{$genre->name}}</label>
                            </div>
                        @endforeach
                    </div>
                    <label for="annee">Année de parution :</label>
                    <input type="number" class="py-2" name="annee" value="" required>
                    <button type="submit" class="btn btn-primary btn-lg">Editer</button>
                </form> 
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

@endsection

