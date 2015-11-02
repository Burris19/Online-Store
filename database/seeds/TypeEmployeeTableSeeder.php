<?php

use Illuminate\Database\Seeder;

class TypeEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Repositories\TypeEmployee\TypeEmployee::class,1)->create();
    }
}
