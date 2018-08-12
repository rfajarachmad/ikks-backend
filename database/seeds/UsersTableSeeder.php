<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
        	'id' => 1,
        	'tenant_id' => 0,
        	'first_name' => 'System',
        	'last_name' => 'Admin',
			'email' => 'admin@mail.com',
			'password' => '$2y$10$z7Njgowt9tL91GuRTwpP6.yAfbPgarNGtsTYdQhAjHEPIpxuEj4ue',
            'status' => 'PENDING',
			'role' => '',
			'created_by' => 1,
			'updated_by' => 1
        ]);

        User::create([
            'id' => 2,
            'tenant_id' => 1,
            'first_name' => 'Fajar',
            'last_name' => 'Achmad',
            'email' => 'fajar@ikks.group',
            'password' => '$2y$10$z7Njgowt9tL91GuRTwpP6.yAfbPgarNGtsTYdQhAjHEPIpxuEj4ue',
            'status' => 'ACTIVE',
            'role' => 'FAMILY_OWNER',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        User::create([
            'id' => 3,
            'tenant_id' => 1,
            'first_name' => 'Muhammad',
            'last_name' => 'Iqbal',
            'email' => 'iqbal@ikks.group',
            'password' => '$2y$10$z7Njgowt9tL91GuRTwpP6.yAfbPgarNGtsTYdQhAjHEPIpxuEj4ue',
            'status' => 'ACTIVE',
            'role' => 'ADMIN',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }

}

?>