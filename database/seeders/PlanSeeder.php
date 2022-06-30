<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plans;

class PlanSeeder extends Seeder
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
        'title' => 'Premium Plan',
        'identifier' => 'Premium',
        'stripe_id' => 'price_1LBaSgSEEGJeqQkYOyynuSfN',
        'price' => '100',

      ],
      [
        'title' => 'Basic Plan',
        'identifier' => 'Basic',
        'stripe_id' => 'price_1LBaVhSEEGJeqQkY8WTj97MR',
        'price' => '10',

      ],
    ];

    foreach ($plan as $key => $value) {
      plans::create($value);
    }
  }
}
