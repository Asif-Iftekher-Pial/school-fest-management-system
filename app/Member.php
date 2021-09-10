<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'member_name', 'designation', 'member_image', 'description', 'committee_id'
    ];

    public function Committee()
    {
        return $this->belongsTo('App\Committee');
    }
}
