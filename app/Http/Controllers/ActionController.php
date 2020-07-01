<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class ActionController extends Controller
{
    public function addOne(Request $request)
    {
        Book::addOne($request);
        flash('Livre ajoutée avec succès !')->success();
        return redirect('/listing');
    }
    public function addOneAuthor(Request $request)
    {
        Author::addOne($request);
        flash('Auteur ajoutée avec succès !')->success();
        return redirect('/listing');
    }
    public function deleteBook(Request $request)
    {
        $supp = Book::deleteBook($request['id']);
        flash('Livre supprimé avec succès !')->success();
        return redirect('/listing');
    }
    public function updateBook(Request $request)
    {
  
        $book = [
            'id' => $request['id'],
            'titre' => $request['titre'],
            'author_id' => $request['auteur'],
            'description' => $request['description'],
            'genre' => $request['genre'],
            'année_de_parution' => $request['annee'],
        ];
        $result = Book::updateBook($book);
        flash('Livre mis à jour avec succès !')->success();
        return redirect('/listing');
    }

    // AUTHOR SECTION



    public function deleteAuthor(Request $request)
    {
        $supp = Author::deleteAuthor($request['id']);
        flash('Auteur supprimé avec succès !')->success();
        return redirect('/addAuthor');
    }
    public function updateAuthor(Request $request)
    {
        $result = Author::updateAuthor($request);
        flash('Auteur mis à jour avec succès !')->success();
        return redirect('/addAuthor');
    }
}
