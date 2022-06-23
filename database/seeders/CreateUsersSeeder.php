<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class CreateUsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = [
      [
        'name' => 'Admin',
        'first_name' => 'dipesh',
        'last_name' => 'patidar',
        'email' => 'admin@gmail.com',
        'is_admin' => '1',
        'password' => bcrypt('12345678'),
      ],
      [
        'name' => 'User',
        'first_name' => 'deepak',
        'last_name' => 'patel',
        'email' => 'user@gmail.com',
        'is_admin' => '0',
        'password' => bcrypt('12345678'),
      ],
    ];

    foreach ($user as $key => $value) {
      User::create($value);
    }
  }
}
