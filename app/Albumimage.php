<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albumimage extends Model
{
    protected $table = 'albumimages';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'img_name', 'album_id'
    ];

    public function Album()
    {
        return $this->belongsTo('App\Album');
    }
}
