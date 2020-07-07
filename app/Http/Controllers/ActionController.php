<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Genre;

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
    public function addOneGenre(Request $request)
    {
        Genre::addOne($request);
        flash('Genre ajoutée avec succès !')->success();
        return redirect('/listing');
    }
    public function deleteBook(Request $request)
    {
        $supp = Book::find($request->id);
        $supp->genres()->detach();
        $supp->delete();

        flash('Livre supprimé avec succès !')->success();
        return redirect('/listing');
    }
    public function updateBook(Request $request)
    {
  
        Book::updateBook($request);
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

    // GENRE SECTION

    public function deleteGenre(Request $request)
    {
        $supp = Genre::deleteGenre($request['id']);
        flash('Genre supprimé avec succès !')->success();
        return redirect('/addGenre');
    }
    public function updateGenre(Request $request)
    {
        $result = Genre::updateGenre($request);
        flash('Genre mis à jour avec succès !')->success();
        return redirect('/addGenre');
    }
}
