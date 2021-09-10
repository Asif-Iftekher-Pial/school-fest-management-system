<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsors';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title', 'description', 'sponsors_image', 'status'
    ];
}
