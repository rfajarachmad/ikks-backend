<?php

use Illuminate\Database\Seeder;
use App\FamilyMember;

class FamilyMembersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('family_members')->delete();

        FamilyMember::create([
        	'id' => 1,
        	'family_id' => 1,
            'user_id' => 2,
            'full_name' => 'Fajar Achmad',
            'nick_name' => 'Dadan',
            'year_of_date' => '2000',
            'mobile_phone' => '08123456789',
            'home_phone' => '08123456789',
            'address' => 'Jatiwaringin Bekasi',
			'created_by' => 1,
			'updated_by' => 1
        ]);

        FamilyMember::create([
            'id' => 2,
            'family_id' => 1,
            'user_id' => 3,
            'full_name' => 'Muhammad Iqbal',
            'nick_name' => 'Iqbal',
            'year_of_date' => '2000',
            'mobile_phone' => '08123456789',
            'home_phone' => '08123456789',
            'address' => 'Depok',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }

}

?>