<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\Religionseeder;
use Database\Seeders\BloodTableSeeder;
use Database\Seeders\GenderTableSeeder;
use Database\Seeders\parintTableSeeder;
use Database\Seeders\ParentsTableSeeder;
use Database\Seeders\Nationalitiesseeder;
use Database\Seeders\SectionsTableSeeder;
use Database\Seeders\settingsTableSeeder;
use Database\Seeders\StudentsTableSeeder;
use Database\Seeders\ClassroomTableSeeder;
use Database\Seeders\SpecializationsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call( Nationalitiesseeder::class );
        $this->call( Religionseeder::class );
        $this->call( BloodTableSeeder::class );
        $this->call( SpecializationsTableSeeder::class );
        $this->call( GenderTableSeeder::class );
        
        $this->call( UserSeeder::class);
        $this->call( GradeSeeder::class);
        $this->call( ClassroomTableSeeder::class);
        $this->call( SectionsTableSeeder::class);
        $this->call( ParentsTableSeeder::class);
        //$this->call( parintTableSeeder::class);
        $this->call( StudentsTableSeeder::class);
        $this->call(settingsTableSeeder::class);

        
    }
}

