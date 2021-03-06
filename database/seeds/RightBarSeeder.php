<?php

use Illuminate\Database\Seeder;

class RightBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('right_bar')->insert([
            ['title' => 'My Posts',
                'path' => 'myroom/posts'],
            [
                'title' => 'My Comments',
                'path' => 'myroom/comments'
            ],
            [
                'title' => 'My Subscribes',
                'path' => 'myroom/subscribes'
            ],
            [
                'title' => 'Account Settings',
                'path' => 'myroom/settings'
            ]
        ]);
    }
}
