<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\E_ShoperBanner;

class EShoperBannerSeeder extends Seeder
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
        'title' => 'demo',
        'description' => 'This is demo',
        'banner' => '1654671476.event_cat_01.jpg',


      ],
      [
        'title' => 'test',
        'description' => 'this is test',
        'banner' => '1654671476.event_cat_01.jpg',


      ],
    ];

    foreach ($plan as $key => $value) {
      E_ShoperBanner::create($value);
    }
  }
}
