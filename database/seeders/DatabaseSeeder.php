<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        $this->createAdmin();

        for($i = 0; $i < 100; $i++)
        {
            User::factory(10000)->create();

            dump('Batch of 10000 users created.');
        }

         User::factory()->create();
    }

    private function createAdmin()
    {
        $user = new User();
        $user->first_name = 'Super';
        $user->last_name = 'Admin';
        $user->email = 'admin@ninacare.com';
        $user->country = 'NL';
        $user->city = 'Delft';
        $user->post_code = '12345';
        $user->street = 'Barrio Sesamo 12';
        $user->password = Hash::make('12345');

        $user->save();
    }
}
