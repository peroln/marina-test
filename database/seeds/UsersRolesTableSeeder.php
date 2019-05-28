<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_roles')->insert([
            'user_id' => User::where('email','admin@admin.com')->value('id'),
            'role_id' => Role::where('name', 'administrator')->value('id')
        ]);
    }
}
