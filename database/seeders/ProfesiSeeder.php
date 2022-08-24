<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data =[
            [
                'nama_profesi'      => 'Perawat',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Dokter',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Bidan',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Farmasi',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Radiografer',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Penata Anestesi',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Fisioterapi',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Okupasi Terapi',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Terapis Wicara',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Analis Kesehatan',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Perekamedis',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Dietisien',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Elektro Medis',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Sanitarian',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Keselamatan dan Kesehatan Kerja',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Akuntan',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Pranata Komputer',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
            [
                'nama_profesi'      => 'Analis Kepegawaian',
                'slug'              => md5(uniqid()),
                'created_by'        => 1,
                'created_at'        => now()
            ],
        ];
        \DB::table('profesis')->insert($data);
    }
}
