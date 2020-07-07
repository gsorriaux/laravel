<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
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
        $book->année_de_parution = $request->annee;
        $book->save();

        foreach($request->genres as $genre){
            $book->genres()->attach($genre);
        };  
        return;
    }

    public static function deleteBook($id)
    {
        return Book::destroy($id);
    }
    public static function updateBook($request)
    {
        $book = Book::find($request->id);
        $book->titre = $request->titre;
        $book->author_id = $request->auteur;
        $book->description = $request->description;
        $book->année_de_parution = $request->annee;
        $book->save();
        
        $book->genres()->sync($request->genres);
        
        return;
    }
    protected $fillable = ['titre', 'author_id', 'description', 'genre', 'année_de_parution'];
}
