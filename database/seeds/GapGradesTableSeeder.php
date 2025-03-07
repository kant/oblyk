<?php

use Illuminate\Database\Seeder;

class GapGradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gap_grades')->insert([
            'spreadable_id' => 1,
            'spreadable_type' => 'App\Sector',
            'min_grade_val' => 32,
            'max_grade_val' => 39,
            'min_grade_text' => '6a/+',
            'max_grade_text' => '7b',
            'created_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('gap_grades')->insert([
            'spreadable_id' => 1,
            'spreadable_type' => 'App\Crag',
            'min_grade_val' => 32,
            'max_grade_val' => 39,
            'min_grade_text' => '6a/+',
            'max_grade_text' => '7b',
            'created_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
