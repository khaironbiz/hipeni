<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyMethodSeeder extends Seeder
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
                'study_method'  => 'Teori',
                'slug'          => uniqid(),
                'created_by'    => 1
            ],
            [
                'study_method'  => 'Penugasan',
                'slug'          => uniqid(),
                'created_by'    => 1
            ],
            [
                'study_method'  => 'Praktek Lapangan',
                'slug'          => uniqid(),
                'created_by'    => 1
            ],
        ];
        \DB::table('study_methods')->insert($data);
    }
}
