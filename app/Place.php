<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model{
    //

    protected $fillable = ['place_name' , 'place_type' , 'place_short_name' , 'place_code'];
}
