<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Fahmi",
            'email' => 'fahmi@codesomnia.xyz',
            'password' => bcrypt('12345678')
        ]);
    }
}
