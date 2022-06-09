<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Inspiration;
class InspirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspirations')->insert([
            'title' => 'BEST DEALS IN TOWN',
            'image' => '1654671476.event_cat_01.jpg',
            
        ]);
    }
}
