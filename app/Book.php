<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "book";

    public function getType()
    {
        return $this->hasOne('App\TypeOfBook', 'id', 'typeOfBook_id');
    }


    public function getPublisher()
    {
        return $this->hasOne('App\Publisher', 'id', 'publisher_id');
    }


    public function getAuthor()
    {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }

}
