<?php

use Illuminate\Database\Seeder;
use App\Employee;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class, 5)->create();
    }
}
