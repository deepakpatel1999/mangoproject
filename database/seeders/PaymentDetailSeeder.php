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
       
        
        'total_amount' => '65',

      ],

    ];

    foreach ($plan as $key => $value) {
      PaymentDetail::create($value);
    }
  }
}
