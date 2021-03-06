<?php

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
        $this->call(ShopCategoriesTableSeeder::class);
        $this->call(ShopProductsTableSeeder::class);
        $this->call(ShopOrderStatusesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
