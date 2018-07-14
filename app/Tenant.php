<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
	protected $fillable = [
        'contact_name', 'billing_address', 'subscription_plan', 'created_by', 'updated_by'
    ];
}
