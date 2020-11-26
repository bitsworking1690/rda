<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthFacility extends Model
{
    // Adding fillable fields
    protected $fillable = ['hf_name','hf_type','hf_location','hf_province','hf_district'];
}
