<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //table name
    protected $table = 'items';
    public $timestamps = false;
    
}
