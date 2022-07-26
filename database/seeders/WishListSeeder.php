<?php

namespace Database\Seeders;

use App\Models\WishList;
use Illuminate\Database\Seeder;

class WishListSeeder extends Seeder
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

      ],

    ];

    foreach ($plan as $key => $value) {
      WishList::create($value);
    }
  }
}
