<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'tenant_id', 'name', 'created_by', 'updated_by'
    ];

}
