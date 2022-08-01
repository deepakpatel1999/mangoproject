<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BillingAddressUstora;

class BillingAddressUstoraSeeder extends Seeder
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
        'compony_name' => 'abc',
        'email' => 'xyz@gmail.com',
       
        'first_name' => 'xyz',
        
        'last_name' => 'xyz',
        'address1' => 'xyz',
        'address2' => 'xyz',
        'zip_code' => 'xyz',
        'country' => 'xyz',
        'state' => 'xyz',
        'phone' => 'xxx',
        'city' => 'xxx',
        'optional_address' => 'xyz',
      ],

    ];

    foreach ($plan as $key => $value) {
      BillingAddressUstora::create($value);
    }
  }
}
