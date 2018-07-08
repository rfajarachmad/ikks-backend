<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Tenant;
use App\User;
use App\Family;
use App\FamilyMember;

class TenantController extends Controller
{

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|max:50',
            'family_name' => 'required|max:50',
            'billing_address' => 'required|max:100',
            'subscription_plan' => 'required|max:50',
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->messages(), 400);
        }

        //Create Tenant
    	$tenant = new Tenant();
    	$tenant->contact_name = $request->first_name." ".$request->last_name;
        $tenant->billing_address = $request->billing_address;
        $tenant->subscription_plan = $request->subscription_plan;
        $tenant->created_by = 1;
        $tenant->updated_by = 1;
    	$tenant->save();

        //Create User as Family Owner
    	$user = new User();
    	$user->tenant_id = $tenant->id;
    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->role = 'FAMILY_OWNER';
        $user->created_by = 1;
        $user->updated_by = 1;
    	$user->save();

        //Create Family
    	$family = new Family();
    	$family->tenant_id = $tenant->id;
    	$family->name = $request->family_name;
        $family->created_by = $user->id;
        $family->updated_by = $user->id;
    	$family->save();

        //Add user as family member
        $familyMember = new FamilyMember();
        $familyMember->family_id = $family->id;
        $familyMember->user_id = $user->id;
        $familyMember->full_name = $request->first_name." ".$request->last_name;
        $familyMember->address = $tenant->billing_address;
        $familyMember->created_by = $user->id;
        $familyMember->updated_by = $user->id;
        $familyMember->save();

    	return response()->json($user, 201);
    }
}
