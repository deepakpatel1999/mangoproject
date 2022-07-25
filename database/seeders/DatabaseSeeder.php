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
use Database\Seeders\MostLoveBySeeder;
use Database\Seeders\EditerPicSeeder;
use Database\Seeders\TrySomethingSeeder;
use Database\Seeders\MoreToExploreSeeder;
use Database\Seeders\BrowseByCategorySeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\EShoperBannerSeeder;
use Database\Seeders\FeaturItemSeeder;
use Database\Seeders\ReccommededSeeder;
use Database\Seeders\TShirtSeeder;
use Database\Seeders\BlazersSeeder;
use Database\Seeders\SunglassSeeder;
use Database\Seeders\KidsDataSeeder;
use Database\Seeders\PoloShirtSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ShopCategorySeeder;
use Database\Seeders\AddToCardSeeder;
use Database\Seeders\BillingAddressSeeder;
use Database\Seeders\PaymentDetailSeeder;




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
    $this->call(MostLoveBySeeder::class);
    $this->call(EditerPicSeeder::class);
    $this->call(TrySomethingSeeder::class);
    $this->call(MoreToExploreSeeder::class);
    $this->call(BrowseByCategorySeeder::class);
    $this->call(SettingSeeder::class);
    $this->call(BannerSeeder::class);
    $this->call(EShoperBannerSeeder::class);
    $this->call(FeaturItemSeeder::class);
    $this->call(ReccommededSeeder::class);
    $this->call(TShirtSeeder::class);
    $this->call(BlazersSeeder::class);
    $this->call(SunglassSeeder::class);
    $this->call(KidsDataSeeder::class);
    $this->call(PoloShirtSeeder::class);
    $this->call(ProductSeeder::class);
    $this->call(ShopCategorySeeder::class);
    $this->call(AddToCardSeeder::class);
    $this->call(BillingAddressSeeder::class);
    $this->call(PaymentDetailSeeder::class);

  }
}


