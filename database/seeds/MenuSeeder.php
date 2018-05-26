<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
        ['title' => 'Home',
            'path' => 'home'],
            [
                'title' => 'Contact',
                'path' => 'contact'
            ],
            [
                'title' => 'About',
                'path' => 'about'
            ],
            [
                'title' => 'My Room',
                'path' => 'myroom'
            ]
        ]);
    }
}
