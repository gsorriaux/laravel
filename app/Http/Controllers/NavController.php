<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

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
        return view('listing', [
            'books' => $books,
            'authors' => $authors
            ]);
    }
    public function add()
    {
        $authors = Author::getAll();
        return view('add', ['authors' => $authors]);
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
}
