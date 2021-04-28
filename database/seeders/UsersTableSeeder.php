<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Admin',
            'password' => bcrypt('password'),
            'role' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
    		'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
        DB::table('users')->insert([
            'username' => 'Faculty',
            'password' => bcrypt('password'),
            'role' => 4,
            'status' => 2,
            'created_at' => Carbon::now()->format('Y-m-d'),
    		'updated_at' => Carbon::now()->format('Y-m-d')
        ]);
    }
}
