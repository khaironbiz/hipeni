<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserJobSeeder extends Seeder
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
                'user_id'   => 1,
                'mulai'     => '2010-10-01',
                'selesai'   => '2012-12-31',
                'posisi'    => 'Perawat Pelaksanan',
                'perusahaan'=> 'RSUPN Dr. Cipto Mangunkusumo Jakarta',
                'slug'      => uniqid(),
                'active'    => 0,
                'created_at'=>now()
            ],
            [
                'user_id'   => 1,
                'mulai'     => '2013-01-01',
                'selesai'   => '2020-05-31',
                'posisi'    => 'Staf Ahli Bidang Keperawatan',
                'perusahaan'=> 'RS Pusat Otak Nasional',
                'slug'      => uniqid(),
                'active'    => 0,
                'created_at'=>now()
            ],
            [
                'user_id'   => 1,
                'mulai'     => '2014-06-01',
                'selesai'   => '2020-12-31',
                'posisi'    => 'Sekretaris Panitia Penerima Barang dan Jasa',
                'perusahaan'=> 'RS Pusat Otak Nasional',
                'slug'      => uniqid(),
                'active'    => 0,
                'created_at'=>now()
            ],
            [
                'user_id'   => 1,
                'mulai'     => '2019-12-01',
                'selesai'   => '2022-07-30',
                'posisi'    => 'Ketua Sub Komite Mutu Profesi Komite Keperawatan',
                'perusahaan'=> 'RS Pusat Otak Nasional',
                'slug'      => uniqid(),
                'active'    => 1,
                'created_at'=>now()
            ],
        ];
        \DB::table('user_jobs')->insert($data);
    }
}
