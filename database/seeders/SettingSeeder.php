<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = [
            [   'address' => '121 King St, VIC 3000, Dubai',
                'contact' => '(000) 233-3236',
                'email' => 'qidz@somemail.com',
                'about_us' => 'QiDZ is here to make your life easier, help you plan and inspire you to have even more fun with your kids! Download QiDZ today and start planning amazing family activities in your city.',
                'logo' => '1654671476.event_cat_01.jpg',

            ],
            
        ];

        foreach ($plan as $key => $value) {
            Setting::create($value);
        }
    }
}
