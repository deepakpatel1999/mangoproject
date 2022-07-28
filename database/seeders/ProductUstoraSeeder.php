<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductUstora;

class ProductUstoraSeeder extends Seeder
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
          'product_name' => 'redmi',
          'quantity' => '1',
          'image' => '1654671476.event_cat_01.jpg',
          'discount_price' => '52',
          'price' => '56',
          'top_seller' => '1',
          'recently_view' => '1',
          'top_new' => '1',
          'details' => 'This Is redmi',
          
  
        ],
        [
          'cat_id' => '1',
          'product_name' => 'nokia',
          'quantity' => '1',
          'image' => '1654671476.event_cat_01.jpg',
          'discount_price' => '52',
          'price' => '56',
          'top_seller' => '1',
          'recently_view' => '1',
          'top_new' => '1',
          'details' => 'This Is nokia',
  
        ],
      ];
  
      foreach ($plan as $key => $value) {
        ProductUstora::create($value);
      }
            
    }
}
