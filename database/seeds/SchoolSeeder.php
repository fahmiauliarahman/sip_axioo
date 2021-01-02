<?php

use App\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'school_name' => "SMK 1 Bekasi",
            'school_address' => "Jalan SMK 1 Bekasi"
        ]);
    }
}
