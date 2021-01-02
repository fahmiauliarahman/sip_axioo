<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'name' => "Fahmi",
            'email' => "fahmi@codesomnia.xyz",
            'website' => "codesomnia.xyz",
            'message' => "Test Message",
        ]);
    }
}
