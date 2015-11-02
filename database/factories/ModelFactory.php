<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Repositories\User\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Julian Hernandez',
        'email' => 'admin@gmail.com',
        'password' => 'admin',
        'type' => 'administrator',
        'remember_token' => str_random(10)

    ];
});

$factory->define(App\Repositories\Department\Department::class, function (Faker\Generator $faker) {
    return [
        'codePostal' => '01001',
        'description' => 'Guatemala'
    ];
});

$factory->define(App\Repositories\City\City::class, function (Faker\Generator $faker) {
    return [
        'id_department' => App\Repositories\Department\Department::all()->random()->id,
        'codePostal' => '01001',
        'description' => 'Guatemala'
    ];
});

$factory->define(App\Repositories\Store\Store::class, function (Faker\Generator $faker) {
    return [
        'code' => 'A-1',
        'name' => 'Central',
        'phone' => '7788552266',
        'id_city' => App\Repositories\City\City::all()->random()->id
    ];
});

$factory->define(App\Repositories\Category\Category::class, function (Faker\Generator $faker) {
    return [
        'code' => 'C-1',
        'title' => 'Informatica',
        'description' => 'Productos relacionados con la informatica'
    ];
});

$factory->define(App\Repositories\Provider\Provider::class, function (Faker\Generator $faker) {
    return [
        'code' => 'Pv-1',
        'email' => 'hp@gmail.com',
        'name' => 'HP',
        'description' => 'Proveedor de computadora y sus partes',
        'phone' => '77889966'
    ];
});

$factory->define(App\Repositories\Product\Product::class, function (Faker\Generator $faker) {
    return [
        'id_category' =>  App\Repositories\Category\Category::all()->random()->id,
        'id_provider' =>  App\Repositories\Provider\Provider::all()->random()->id,
        'title' => 'Monitor',
        'description' =>'Monitor con alta resolucion apto para juegos',
        'code' => 'P-1',
        'price' => 1500.00,
        'image' => 'products/default.png',
        'existence' => 100
    ];
});

$factory->define(App\Repositories\StoreProducts\StoreProduct::class, function (Faker\Generator $faker) {
    return [
        'idStore' =>  App\Repositories\Store\Store::all()->random()->id,
        'idProduct' =>  App\Repositories\Product\Product::all()->random()->id
    ];
});

$factory->define(App\Repositories\TypeEmployee\TypeEmployee::class, function (Faker\Generator $faker) {
    return [
        'description' => 'Administrador',
    ];
});

$factory->define(App\Repositories\Employee\Employee::class, function (Faker\Generator $faker) {
    return [
        'id_type_employee' => App\Repositories\City\City::all()->random()->id,
        'id_store' => App\Repositories\City\City::all()->random()->id,
        'id_user' => App\Repositories\City\City::all()->random()->id,
        'name' => 'Julian',
        'last_name' => 'Hernandez',
        'phone' => '53345060',
        'image' => 'admin.png',
        'license_no' => '44445646',
        'type_license' => 'A'
    ];
});
