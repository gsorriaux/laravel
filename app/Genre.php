<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{   
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
    public static function getAll()
    {
        return Genre::all();
    }
    public static function addOne($request)
    {
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();
        return;
    }
    public static function deleteGenre($id)
    {
        return Genre::destroy($id);
    }
    public static function updateGenre($request)
    {
        $id = $request->id;
        return Genre::find($id)->update([
            'name' => $request->name
        ]);
    }
    
    protected $fillable = ['name'];
}
