<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(StoreTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(TypeEmployeeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(StoreProductsTableSeeder::class);
        $this->call(StoreAddressTableSeeder::class);
        Model::reguard();
    }
}
