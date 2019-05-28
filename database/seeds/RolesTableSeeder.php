<?php

use Illuminate\Database\Seeder;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => User::ROLE_ADMINISTRATOR],
            ['name' => User::ROLE_CUSTOMER]
        ]);
    }
}
