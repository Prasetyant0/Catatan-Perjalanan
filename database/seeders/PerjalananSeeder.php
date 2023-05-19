<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            DB::table('perjalanans')
            ->insert([
                'user_id' => User::all()->random()->id,
                'tanggal' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'waktu' => $faker->time('H:i'),
                'suhu' => $faker->numberBetween(32, 40),
                'lokasi' => $faker->city
            ]);
        }
    }
}
