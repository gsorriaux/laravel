<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static function getAll()
    {
        return Author::all()->sortBy('name');
    }
    public static function addOne($request)
    {
        $author = new Author;
        $author->name = $request->name;
        $author->save();
        return;
    }
    public static function deleteAuthor($id)
    {
        return Author::destroy($id);
    }
    public static function updateAuthor($request)
    {
        $id = $request->id;
        return Author::find($id)->update([
            'name' => $request->name
        ]);
    }
    protected $fillable = ['name'];

}
