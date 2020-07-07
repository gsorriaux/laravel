@extends('layouts.base')

@section('title', 'Ajout')
    
@section('content')
<div class="container-lg">
    <form action="/addGenre" method="POST" class="w-75">
        @csrf
        <div class="form-group-lg">
            <label for="name">Nom du genre :</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <input type="submit" value="Ajouter" class="btn btn-outline-primary">
    </form>
</div>

<div class="container-lg">
    <table class="table w-75">
        <thead class="thead-light">
            <tr>
                <th>Nom du genre</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        @foreach ($genres as $genre)
        <tr>
            <td>{{$genre->name}}</td>
            <td>
                <button class="btn btn-outline-info" data-toggle="modal" data-target="#editAuthor" data-author="{{$genre->name}}" data-authorid="{{$genre->id}}">Editer</button>
            </td>
            <td>
                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteAuthor" data-author="{{$genre->name}}" data-authorid="{{$genre->id}}">X</button>
            </td>
        </tr>
        @endforeach    
    </table>
</div>



{{-- DELETE MODAL --}}

<div class="modal" id="deleteAuthor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredLabel">Titre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="author"></p>
            </div>
            <div class="modal-footer justify-content-center">
                <form action="/suppGenre" method="post">
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

<div class="modal" id="editAuthor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/updateGenre" method="post" class="d-flex flex-column py-3">@csrf

                        <input type="number" class="py-2" name="id" value="" hidden>                    
                        <label for="auteur">Nom du genre :</label>
                        <input type="text" class="py-2" name="name" value="" required>

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
