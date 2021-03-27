<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    /**
     * Get the writers of a book.
     */
    public function writers()
    {
        return $this->belongsToMany('App\Models\Writer', 'book_writer', 'book_id', 'writer_id');
    }
}
