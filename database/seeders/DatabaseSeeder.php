<?php

namespace Database\Seeders;

use App\Models\Edic;
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
        $this->call([
            EdicSeeder::class,
        ]);

        //Edic::factory(10)->create();
    }
}
