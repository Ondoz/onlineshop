<?php

use App\Categories;
use Illuminate\Database\Seeder;
use App\Product;
use App\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesAndPermissionsSeeder::class);
        factory(Product::class, 50)->create();
        factory(Review::class, 300)->create();
        factory(Categories::class, 100)->create();
        $cateories = Categories::all();

        // Populate the pivot table
        Product::all()->each(function ($product) use ($cateories) {
            $product->categories()->attach(
                $cateories->random(rand(1, 5))->pluck('id')->unique()->toArray()
            );
        });
    }
}
