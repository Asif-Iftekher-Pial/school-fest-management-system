<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentgroup extends Model
{
    protected $table = 'studentgroups';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title', 'description', 'status', 'event_id', 'category_id', 'group_id', 'user_id',
    ];

    public function Student()
    {
        return $this->hasMany('App\Student');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
