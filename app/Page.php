<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable=[
        'main_menu', //dropdown
        'menu_name', //text
        'menu_url', //textfield> no space,no capital,no special carecter
        'layout', //dropdown
        'status',
        'contant',
        'image'
    ];
}
