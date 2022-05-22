<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = New Teacher();
        $teacher->name = 'teacher';
        $teacher->email = 'teacher@mail.com';
        $teacher->password = bcrypt('12345678');
        $teacher->description = 'description';
        $teacher->save();
    }
}
