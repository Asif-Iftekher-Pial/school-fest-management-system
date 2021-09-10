<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'description', 'status', 'eventimg',
    ];

    public function Category()
    {
        return $this->hasMany('App\Category');
    }

    public function Group()
    {
        return $this->hasMany('App\Group');
    }
}
