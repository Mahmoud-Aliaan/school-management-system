<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\parint;
use App\Models\student;
use App\Models\Classrom;
use App\Models\sections;
use App\Models\My_parint;
use App\Models\Type_Blood;
use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->delete();
        $students = new student();
        $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->gender_id = 1;
        $students->nationalitie_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_id =Type_Blood::all()->unique()->random()->id;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classrom::all()->unique()->random()->id;
        $students->section_id = sections::all()->unique()->random()->id;
        $students->parent_id = My_parint::all()->unique()->random()->id;
         //$students->parent_id = parint::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}
