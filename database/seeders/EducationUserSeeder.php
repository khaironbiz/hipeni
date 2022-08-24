<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationUserSeeder extends Seeder
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
                'user_id'               => 1,
                'education_level_id'    => 10,
                'program_studi'         => 'Keperawatan',
                'institusi'             => 'Politeknik Kesehatan Tasikmalaya',
                'tahun_lulus'           => '2006-09-07',
                'slug'                  => md5(uniqid()),
                'pendidikan_terahir'    => 0,
                'created_at'            => date('Y-m-d H:i:s'),
            ],
            [
                'user_id'               => 1,
                'education_level_id'    => 11,
                'program_studi'         => 'Keperawatan',
                'institusi'             => 'Universitas Binawan',
                'tahun_lulus'           => '2019-09-07',
                'slug'                  => md5(uniqid()),
                'pendidikan_terahir'    => 0,
                'created_at'            => date('Y-m-d H:i:s'),
            ],
            [
                'user_id'               => 1,
                'education_level_id'    => 14,
                'program_studi'         => 'Ners',
                'institusi'             => 'Universitas Binawan',
                'tahun_lulus'           => '2020-09-07',
                'slug'                  => md5('1 Ners Universitas Binawan'),
                'pendidikan_terahir'    => 0,
                'created_at'            => date('Y-m-d H:i:s'),
            ],
        ];
        \DB::table('education_users')->insert($data);
    }
}
