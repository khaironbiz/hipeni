<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoCategorySeeder extends Seeder
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
                'category'      => 'Programming',
                'slug'          => uniqid(),
                'created_by'    => 1,
                'created_at'    => now()
            ],
            [
                'category'      => 'Nursing Informatics',
                'slug'          => uniqid(),
                'created_by'    => 1,
                'created_at'    => now()
            ],
        ];
        \DB::table('video_categories')->insert($data);
    }
}
