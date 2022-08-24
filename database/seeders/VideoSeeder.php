<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'category'      => 2,
                'judul'         => 'TUTORIAL LARAVEL DASAR',
                'id_video'      => 'ClMX6TXvh_o',
                'channel'       => 'Programmer Zaman Now',
                'slug'          => uniqid(),
                'created_by'    => 1,
                'publish'       => 0,
                'created_at'    => now()
            ],
            [
                'category'      => 2,
                'judul'         => 'BELAJAR HTTP',
                'id_video'      => '92Rjzrq4oIg',
                'channel'       => 'Programmer Zaman Now',
                'slug'          => uniqid(),
                'created_by'    => 1,
                'publish'       => 0,
                'created_at'    => now()
            ],

        ];
        \DB::table('videos')->insert($data);
    }
}
