<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    public static function getAll()
    {
        return Book::all();
    }
    public static function addOne($request)
    {
        $book = new Book;
        $book->titre = $request->titre;
        $book->author_id = $request->auteur;
        $book->description = $request->description;
        $book->genre = $request->genre;
        $book->année_de_parution = $request->annee;
        $book->save();
        return;
    }

    public static function deleteBook($id)
    {
        return Book::destroy($id);
    }
    public static function updateBook($data)
    {
        return Book::find($data['id'])->update($data);
    }
    protected $fillable = ['titre', 'author_id', 'description', 'genre', 'année_de_parution'];
}
