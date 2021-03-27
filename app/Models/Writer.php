<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $table = 'writers';

    /**
     * Get books by a writer.
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'book_writer', 'writer_id', 'book_id');
    }
}
