<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'id' => 1,
            'role_name' => 'Admin',
            'created_at' => Carbon::now()->format('Y-m-d'),
    		'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('user_roles')->insert([
            'id' => 2,
            'role_name' => 'Moderator',
            'created_at' => Carbon::now()->format('Y-m-d'),
    		'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('user_roles')->insert([
            'id' => 3,
            'role_name' => 'Registrar',
            'created_at' => Carbon::now()->format('Y-m-d'),
    		'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('user_roles')->insert([
            'id' => 4,
            'role_name' => 'Faculty',
            'created_at' => Carbon::now()->format('Y-m-d'),
    		'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('user_roles')->insert([
            'id' => 5,
            'role_name' => 'Student',
            'created_at' => Carbon::now()->format('Y-m-d'),
    		'updated_at' => Carbon::now()->format('Y-m-d')
        ]);                
    }
}
