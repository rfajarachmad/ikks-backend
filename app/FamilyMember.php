<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = [
        'family_id', 
        'user_id', 
        'parent_id', 
        'code', 
        'full_name', 
        'nick_name', 
        'year_of_date', 
        'mobile_phone',
        'home_phone',
        'address',
        'photo_url',
        'created_by',
        'updated_by'
    ];
}
