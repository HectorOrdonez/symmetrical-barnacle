<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $attempts = 0;

        // Admin
        $this->createAdmin();

        $times = 1000;
        for($i = 0; $i < $times; $i++)
        {
            $users = [];
            $batchSize = 1000;

            for($j = 0; $j < $batchSize; $j++)
            {
                $users[] = [
                    'first_name' => fake()->name,
                    'last_name' => fake()->lastName,
                    'email' => fake()->email . random_int(1, 10000),
                    'country' => fake()->countryCode,
                    'city' => fake()->city,
                    'post_code' => fake()->postcode,
                    'street' => fake()->streetAddress,
                ];
            }

            try {
                DB::table('users')->insert($users);
            } catch (UniqueConstraintViolationException $e)
            {
                if($attempts > 3)
                {
                    dd('Could not finish seeding the database because of too many duplicate key exceptions.');
                }

                $attempts++;
                dump('Skipped a batch because of duplicate key, attempting again.');
            }

            dump(sprintf('Batch of %d users created.', $batchSize));
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
