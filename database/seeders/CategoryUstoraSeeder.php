<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryUstora;

class CategoryUstoraSeeder extends Seeder
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

        'cat_name' => 'shirt',
        'image' => 'xyz.png',
      ],
      [

        'cat_name' => 'shirt',
        'image' => 'abc.png',

      ],
    ];
    foreach ($plan as $key => $value) {
      CategoryUstora::create($value);
    }
  }
}
