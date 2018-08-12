<?php

use Illuminate\Database\Seeder;
use App\Tenant;

class TenantsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tenants')->delete();

        Tenant::create([
        	'id' => 1,
        	'contact_name' => 'Admin Ikks',
            'billing_address' => 'Jakarta',
            'subscription_plan' => 'FREE',
			'created_by' => 1,
			'updated_by' => 1
        ]);
    }

}

?>