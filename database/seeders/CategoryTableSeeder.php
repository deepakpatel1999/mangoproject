<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Inspiration;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'RIVER',
            'description' => 'This is demo',

        ]);
    }
}
