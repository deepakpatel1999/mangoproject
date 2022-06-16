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
        'title' => 'Primium Plan',
        'identifier' => 'premium',
        'stripe_id' => 'price_1LAW6tSBbKvqfMBZrVXm1FFn',
        'price' => '100',

      ],
      [
        'title' => 'Basic Plan',
        'identifier' => 'Basic',
        'stripe_id' => 'price_1LAW4DSBbKvqfMBZXRnyCQ1a',
        'price' => '10',

      ],
    ];

    foreach ($plan as $key => $value) {
      plans::create($value);
    }
  }
}
