<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'full_name' => "Fahmi Aulia Rahman",
            'school_id' => 1,
            'grade' => '1',
            'phone_num' => '82261656766',
            'email' => 'fahmi@codesomnia.xyz',
            'department_id' => 1
        ]);
    }
}
