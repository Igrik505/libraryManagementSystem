<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    protected $table = "lending";

    public function getReader()
    {
        return $this->hasOne('App\Reader', 'id', 'reader_id');
    }

    public function getBook()
    {
        return $this->hasOne('App\Book', 'id', 'book_id');
    }

}
