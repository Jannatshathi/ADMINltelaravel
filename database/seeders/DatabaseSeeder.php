<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TeacherSeeder;
use App\Models\Teacher;
use App\Models\Student;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            TeacherSeeder::class
        ]);

        //Student::factory(10)->create();
        //Teacher::factory(10)->create();
    }
}
