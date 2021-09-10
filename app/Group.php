<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title', 'class_name', 'student_amount', 'description', 'status', 'category_id'
    ];

    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
