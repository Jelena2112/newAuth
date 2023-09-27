<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $myFaker = Factory::create();

       $this->command->getOutput()->progressStart(500);

        for( $i = 0; $i < 500; $i++)
        {
            User::create([
                'name' => $myFaker->name,
                'email' => $myFaker->email,
                'password' => Hash::make('jsjdlsjdlsjdslj')
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
