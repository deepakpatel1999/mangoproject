<?php

namespace Database\Seeders;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\CreateUsersSeeder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\InspirationSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
        $this->call(CreateUsersSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(InspirationSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
