<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\CreateUsersSeeder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\InspirationSeeder;
use Database\Seeders\PlanSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CreateUsersTable;
use Database\Seeders\MostLoveBy;
use Database\Seeders\EditerPicSeeder;
use Database\Seeders\TrySomethingSeeder;
use Database\Seeders\MoreToExploreSeeder;
use Database\Seeders\BrowseByCategorySeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\BannerSeeder;
class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    $this->call(CreateUsersSeeder::class);
    $this->call(CategoryTableSeeder::class);
    $this->call(InspirationSeeder::class);
    $this->call(PermissionSeeder::class);
    $this->call(RoleSeeder::class);
    $this->call(PlanSeeder::class);
    $this->call(MostLoveBy::class);
    $this->call(EditerPicSeeder::class);
    $this->call(TrySomethingSeeder::class);
    $this->call(MoreToExploreSeeder::class);
    $this->call(BrowseByCategorySeeder::class);
    $this->call(SettingSeeder::class);
    $this->call(BannerSeeder::class);
    
  }
}
