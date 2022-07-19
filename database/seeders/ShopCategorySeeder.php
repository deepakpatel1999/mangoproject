<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShopCategory;

class ShopCategorySeeder extends Seeder
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
       
      ],
      [
       
        'cat_name' => 'shirt',
       
      ],
    ];
    foreach ($plan as $key => $value) {
      ShopCategory::create($value);
    }
  }
}
