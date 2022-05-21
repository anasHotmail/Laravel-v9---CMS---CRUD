<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([
            'blog_name'   => 'Anas Blog' ,
            'phone_number'=> '00 963 938 724956' ,
            'blog_email'  => 'anased85@gmail.com' ,
            'address'     => 'Syria - Damascus'
           ]);
    }
}
