<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AddToCartUstora;

class AddToCartUstoraSeeder extends Seeder
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
        'quant' => '1',

      ],
      [
        'user_id' => '1',
        'product_id' => '1',
        'quant' => '1',
      ],
    ];

    foreach ($plan as $key => $value) {
      AddToCartUstora::create($value);
    }
  }
}
