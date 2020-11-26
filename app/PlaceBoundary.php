<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceBoundary extends Model
{
    // Adding fillable fields
    protected $fillable = ['geometry_name','geometry_type','geometry_center','geo_points','hf_district'];
}
