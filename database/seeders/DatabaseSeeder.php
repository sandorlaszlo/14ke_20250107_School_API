<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Course::factory(5)->create();
        // Student::factory(50)->create();
        // Teacher::factory(5)->create();

        $teachers = Teacher::all();
        $students = Student::all();

        foreach ($students as $student) {
            $student->teachers()->attach(
                $teachers->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
