<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Folder extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'folder';
}
