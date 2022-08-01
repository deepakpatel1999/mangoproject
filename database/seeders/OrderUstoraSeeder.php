<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderUstora;
class OrderUstoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = [
            [
              'user_id' => '1',
              'product_id' => '1',
              'cart_id' => '1',
              'payment_status' => 'panding',
              'status' => 'panding',
              'address' => 'xyz',
              
            ],
            [
              'user_id' => '1',
              'product_id' => '1',
              'cart_id' => '1',
              'payment_status' => 'online',
              'status' => 'panding',
              'address' => 'xyz',
            ],
          ];
      
          foreach ($plan as $key => $value) {
            OrderUstora::create($value);
          }
    }
}
