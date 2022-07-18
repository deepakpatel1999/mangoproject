<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reccommeded;

class ReccommededSeeder extends Seeder
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
        'price' => 'This is demo',
        'image' => '1654671476.event_cat_01.jpg',


      ],
      [
        'title' => 'test',
        'price' => 'this is test',
        'image' => '1654671476.event_cat_01.jpg',


      ],
    ];

    foreach ($plan as $key => $value) {
      Reccommeded::create($value);
    }
  }
}
