<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrySomething;

class TrySomethingSeeder extends Seeder
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
                'title' => 'demo',
                'description' => 'This is demo',
                'image' => '1654671476.event_cat_01.jpg',


            ],
            [
                'title' => 'test',
                'description' => 'this is test',
                'image' => '1654671476.event_cat_01.jpg',


            ],
        ];

        foreach ($plan as $key => $value) {
            TrySomething::create($value);
        }
    }
}
