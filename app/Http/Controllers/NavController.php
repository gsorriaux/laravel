<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Genre;

class NavController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function list()
    {
        $books = Book::getAll();
        $authors = Author::getAll();
        $genres = Genre::getAll();
        return view('listing', [
            'books' => $books,
            'authors' => $authors,
            'genres' => $genres
            ]);
    }
    public function add()
    {
        $authors = Author::getAll();
        $genres = Genre::getAll();
        return view('add', [
            'authors' => $authors,
            'genres' => $genres
            ]);
    }
    public function contact()
    {
        return view('contact');
    }

    public function supp()
    {
        return view('supp');
    }
    public function addAuthor()
    {
        $authors = Author::getAll();
        return view('addAuthor', ['authors' => $authors]);
    }
    public function addGenre()
    {
        $genres = Genre::getAll();
        return view('addGenre', ['genres' => $genres]);
    }
}
