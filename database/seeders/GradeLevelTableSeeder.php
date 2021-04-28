<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GradeLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=10; $i++)
        {
            $GradeLevel = new \App\Models\GradeLevel();
            $GradeLevel->grade = $i;
            $GradeLevel->save();
        }
    }
}
