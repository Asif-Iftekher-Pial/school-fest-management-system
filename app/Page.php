<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable=[
        'title',
        'subtitle',
        'description',
        'image',
        'status'
    ];
}
