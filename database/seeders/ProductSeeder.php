<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
        'cat_id' => '1',
        'product_name' => 'shirt',
        'quantity' => '1',
        'image' => '1654671476.event_cat_01.jpg',
        'price' => '56',
        'is_features' => '0',
        'is_recommanded' => '1',
        'Web_ID' => '1089772',
        'Availability' => 'In Stock',
        'Condition' => 'New',
        'Brand' => 'E-SHOPPER',
        'details' => 'This Is Shirt',
        

      ],
      [
        'cat_id' => '1',
        'product_name' => 'shirt',
        'quantity' => '1',
        'image' => '1654671476.event_cat_01.jpg',
        'price' => '56',
        'is_features' => '1',
        'is_recommanded' => '0',
        'Web_ID' => '1089772',
        'Availability' => 'In Stock',
        'Condition' => 'New',
        'Brand' => 'E-SHOPPER',
        'details' => 'This Is Shirt',

      ],
    ];

    foreach ($plan as $key => $value) {
      Product::create($value);
    }
  }
}
