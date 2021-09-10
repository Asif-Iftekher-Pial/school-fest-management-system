<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $table = 'committees';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title', 'description', 'date', 'type'
    ];

    public function Member()
    {
        return $this->hasMany('App\Member');
    }
}
