<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'display_name' => 'System Manager'],
            ['name' => 'Guest', 'display_name' => 'Guest'],
            ['name' => 'Customer', 'display_name' => 'Customer'],
            ['name' => 'Developer', 'display_name' => 'System Developer'],
            ['name' => 'Employee', 'display_name' => 'Content Editor'],

        ]);
    }
}
