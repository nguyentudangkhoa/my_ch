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
            ProvineSeeder::class,
            DistrictSeeder::class,
            WardSeeder::class,
            CategorySeeder::class,
            ChildCategoryLevelTwoSeeder::class,
            ProductItemSeeder::class,
            ShopSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            PaymentMethodSeeder::class,
            MemberSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            WithdrawMoneySeeder::class,
        ]);
    }
}
