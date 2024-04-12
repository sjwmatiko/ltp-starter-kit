<?php

namespace Database\Seeders;

use App\Models\Sample;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_TZ'); // Set the Faker locale to English Tanzania

        // Seed 10 packages with sample data
        for ($i = 1; $i <= 10; $i++) {
            Sample::create([
                'field_1' => $faker->sentence,
                'field_2' => $faker->paragraph(20),
                'field_3' => rand(1, 20),
                'field_4' => rand(10000, 1000000) / 100,
                'field_5' => Carbon::now()->addDays(30)->toDateString(),
                'field_6' => 'yes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}