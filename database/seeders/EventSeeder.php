<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
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
                'id_penyelenggara'  => 1,
                'judul'             => 'Pelatihan BNLS',
                'education_level'   => 17,
                'ringkasan'         => 'Kegawat daruratan neurologi merupakan masalah akut yang dapat mengancam jiwa manusia',
                'isi'               => 'Kegawat daruratan neurologi merupakan masalah akut yang dapat mengancam jiwa manusia',
                'harga'             => 2500000,
                'kuota'             => 30,
                'date_mulai'        => date('Y-m-d'),
                'date_selesai'      => date('Y-m-d'),
                'tempat'            => 'Ruang Diklat RS Pusat Otak Nasional',
                'created_by'        => 1,
                'status'            => 0,
                'date_publish'      => '2022-08-01',
                'banner'            => 'banner1.jpg',
                'slug'              => md5(uniqid()),
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
        ];
        \DB::table('events')->insert($data);
    }
}
