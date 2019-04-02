<?php

use App\Model\ShopOrderStatus;
use Illuminate\Database\Seeder;

class ShopOrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopOrderStatus::create(
            [
                'title' => 'В обработке',
            ]
        );
        ShopOrderStatus::create(
            [
                'title' => 'Обработан',
            ]
        );
    }
}
