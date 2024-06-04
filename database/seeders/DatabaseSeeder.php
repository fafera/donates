<?php

namespace Database\Seeders;

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
			AddressSeeder::class,
			CategorySeeder::class,
			ItemSeeder::class,
			ItemCategorySeeder::class,
			PhoneSeeder::class
        ]);
		User::factory()->create();
    }
}
