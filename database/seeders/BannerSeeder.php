<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
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

        'banner' => '1654671476.event_cat_01.jpg',


      ],
      [

        'banner' => '1654671476.event_cat_01.jpg',


      ],
    ];

    foreach ($plan as $key => $value) {
      Banner::create($value);
    }
  }
}
