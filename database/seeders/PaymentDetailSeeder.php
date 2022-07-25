<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentDetail;

class PaymentDetailSeeder extends Seeder
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
        'card_name' => 'abc',
        'cart_id' => 'cart_id',
        'payment_status' => 'online',
        'total_amount' => '65',

      ],

    ];

    foreach ($plan as $key => $value) {
      PaymentDetail::create($value);
    }
  }
}
