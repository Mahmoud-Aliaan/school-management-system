<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Grades')->delete();
        $grades = [
            ['en'=> 'Primary stage', 'ar'=> 'المرحلة الابتدائية'],
            ['en'=> 'middle School', 'ar'=> 'المرحلة الاعدادية'],
            ['en'=> 'High school', 'ar'=> 'المرحلة الثانوية'],
        ];

        foreach ($grades as $grade) {
            Grade::create(['name' => $grade]);
        }

    }
}

