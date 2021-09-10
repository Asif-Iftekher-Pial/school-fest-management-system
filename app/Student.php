<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'class',
        'email',
        'mobile',
        'reward',
        'status',
        'event_id',
        'category_id',
        'group_id',
        'user_id',
        'studentgroup_id'
    ];

    public function studentgroup()
    {
        return $this->belongsTo('App\Studentgroup');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
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
}
