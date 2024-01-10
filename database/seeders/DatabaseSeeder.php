<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            ChildCategoryLevelTwoSeeder::class,
            ProductItemSeeder::class,
            ShopSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            PaymentMethodSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
