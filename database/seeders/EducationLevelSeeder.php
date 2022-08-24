<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //deeder
        $data   = [
            [
                'education_type_id' => 1,
                'education_level'   => 'SD',
                'slug'              => md5(Str::random(10)),
                'grade'             => 1,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 1,
                'education_level'   => 'SMP',
                'slug'              => md5(Str::random(10)),
                'grade'             => 2,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 1,
                'education_level'   => 'SMA',
                'slug'              => md5(Str::random(10)),
                'grade'             => 3,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 2,
                'education_level'   => 'MI',
                'slug'              => md5(Str::random(10)),
                'grade'             => 1,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 2,
                'education_level'   => 'MTs',
                'slug'              => md5(Str::random(10)),
                'grade'             => 2,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 2,
                'education_level'   => 'MA',
                'slug'              => md5(Str::random(10)),
                'grade'             => 3,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 3,
                'education_level'   => 'SMK',
                'slug'              => md5(Str::random(10)),
                'grade'             => 3,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 4,
                'education_level'   => 'D1',
                'slug'              => md5(Str::random(10)),
                'grade'             => 4,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 4,
                'education_level'   => 'D2',
                'slug'              => md5(Str::random(10)),
                'grade'             => 5,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 4,
                'education_level'   => 'D3',
                'slug'              => md5(Str::random(10)),
                'grade'             => 6,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 5,
                'education_level'   => 'S1',
                'slug'              => md5(Str::random(10)),
                'grade'             => 7,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 5,
                'education_level'   => 'S2',
                'slug'              => md5(Str::random(10)),
                'grade'             => 9,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 5,
                'education_level'   => 'S3',
                'slug'              => md5(Str::random(10)),
                'grade'             => 11,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 6,
                'education_level'   => 'Profesi',
                'slug'              => md5(Str::random(10)),
                'grade'             => 8,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 6,
                'education_level'   => 'Spesialis',
                'slug'              => md5(Str::random(10)),
                'grade'             => 10,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 6,
                'education_level'   => 'Sub Spesialis',
                'slug'              => md5(Str::random(10)),
                'grade'             => 12,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 7,
                'education_level'   => 'Pelatihan',
                'slug'              => md5(Str::random(10)),
                'grade'             => 6,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 7,
                'education_level'   => 'Workshop',
                'slug'              => md5(Str::random(10)),
                'grade'             => 5,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 7,
                'education_level'   => 'Simposium',
                'slug'              => md5(Str::random(10)),
                'grade'             => 4,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 7,
                'education_level'   => 'Seminar',
                'slug'              => md5(Str::random(10)),
                'grade'             => 3,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 7,
                'education_level'   => 'Loka karya',
                'slug'              => md5(Str::random(10)),
                'grade'             => 2,
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'education_type_id' => 7,
                'education_level'   => 'Kolokium',
                'slug'              => md5(Str::random(10)),
                'grade'             => 1,
                'created_at'        => date('Y-m-d H:i:s')
            ],
        ];
        \DB::table('education_levels')->insert($data);
    }
}
