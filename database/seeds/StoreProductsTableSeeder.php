<?php

use Illuminate\Database\Seeder;

class StoreProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Repositories\StoreProducts\StoreProduct::class,1)->create();
    }
}
