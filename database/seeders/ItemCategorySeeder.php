<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		for ($i=0; $i<=10; $i++) {
			DB::table( 'item_category' )
			  ->insert( [ 'item_id'     => Item::inRandomOrder()->first()->id,
			              'category_id' => Category::inRandomOrder()
			                                       ->first()->id
			  ] );
		}
	}
}
