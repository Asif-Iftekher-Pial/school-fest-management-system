<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videogallery extends Model
{
    protected $table = 'videogalleries';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title', 'video_url' , 'sl_date'
    ];
}
