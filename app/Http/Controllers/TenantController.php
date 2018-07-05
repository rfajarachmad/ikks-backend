<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Tenant;
use App\User;
use App\Family;

class TenantController extends Controller
{
    public function register(Request $request) {
    	$errors = array();
    	if (!$request->has('first_name')) {
    		array_push($errors, 'First name can\'t be empty');
    	}
    	if (!$request->has('last_name')) {
    		array_push($errors, 'Last name can\'t be empty');
    	}
    	if (!$request->has('family_name')) {
    		array_push($errors, 'Family name can\'t be empty');
    	}

    	if (sizeof($errors) > 0 ) {
    		return response()->json($errors, 400);
    	}

    	$tenant = new Tenant();
    	$tenant->pic_name = $request->first_name." ".$request->last_name;
    	$tenant->save();

    	$user = new User();
    	$user->tenant_id = $tenant->id;
    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->role = $request->role;

    	$user->save();

    	$family = new Family();
    	$family->tenant_id = $tenant->id;
    	$family->name = $request->family_name;
    	$family->save();

    	return response()->json($user, 201);
    }
}
