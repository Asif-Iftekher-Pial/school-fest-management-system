<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title', 'description', 'date', 'type'
    ];

    public function Albumimage()
    {
        return $this->hasMany('App\Albumimage');
    }
}
