<?php

namespace App\Http\Controllers;

use App\Book;

class BdController extends Controller
{
    public function bookList()
    {
        $books = Book::all();

        return view('listing', ['books' => $books]);
    }
}
