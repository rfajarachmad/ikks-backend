<?php

use Illuminate\Database\Seeder;
use App\Family;

class FamiliesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('families')->delete();

        Family::create([
        	'id' => 1,
        	'tenant_id' => 1,
            'name' => 'IKKS',
            'description' => 'Ikatan Keluarga Kuraesin Sastrawiguna',
			'created_by' => 1,
			'updated_by' => 1
        ]);
    }

}

?>