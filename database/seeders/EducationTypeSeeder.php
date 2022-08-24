<?php

namespace Database\Seeders;

use App\Models\Education_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class EducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder
        $data   = [
            [
                'sifat'             => 1,
                'education_type'    => 'Sekolah',
                'slug'              => md5(Str::random(10)),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'sifat'             => 1,
                'education_type'    => 'Madrasah',
                'slug'              => md5(Str::random(10)),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'sifat'             => 1,
                'education_type'    => 'Sekolah Kejuruan',
                'slug'              => md5(Str::random(10)),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'sifat'             => 1,
                'education_type'    => 'Vokasi',
                'slug'              => md5(Str::random(10)),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'sifat'             => 1,
                'education_type'    => 'Akademik',
                'slug'              => md5(Str::random(10)),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'sifat'             => 1,
                'education_type'    => 'Profesi',
                'slug'              => md5(Str::random(10)),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'sifat'             => 2,
                'education_type'    => 'CPD',
                'slug'              => md5(Str::random(10)),
                'created_at'        => date('Y-m-d H:i:s'),
            ]
        ];
        \DB::table('education_types')->insert($data);
    }
}
