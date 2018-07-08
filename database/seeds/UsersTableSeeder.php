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
			'role' => '',
			'created_by' => 1,
			'updated_by' => 1
        ]);
    }

}

?>