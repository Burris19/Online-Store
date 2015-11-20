<?php

use Illuminate\Database\Seeder;

class StoreAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Repositories\StoreAddress\StoreAddress::class)->create();
    }
}
