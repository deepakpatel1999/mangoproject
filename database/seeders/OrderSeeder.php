<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
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
        'payment_status' => 'online',
        'status' => 'panding',
        'address' => 'xyz',
      ],
    ];

    foreach ($plan as $key => $value) {
      Order::create($value);
    }
  }
}
