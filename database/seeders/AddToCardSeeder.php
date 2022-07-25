<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AddToCard;

class AddToCardSeeder extends Seeder
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
        'web_id' => '1089772',
        

      ],
      [
        'user_id' => '1',
        'product_id' => '1',
        'web_id' => '1089772',
      ],
    ];

    foreach ($plan as $key => $value) {
      AddToCard::create($value);
    }
  }
}
