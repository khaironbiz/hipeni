<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
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
                'nama_partner'      => 'Himpunan Perawat Neurosains Indonesia',
                'singkatan'         => 'HIPENI',
                'id_pj'             => 1,
                'nama_pj'           => 'Ns. Khairon, S.Kep., S.Kom., M.Kom., MH.',
                'email'             => 'khaironbiz@gmail.com',
                'hp'                => '081213798746',
                'website'           => 'https://hipeni.or.id',
                'nomor_sk'          => rand(100000,999999),
                'tanggal_sk'        => date('Y-m-d H:i:s'),
                'valid_to'          => date('Y-m-d H:i:s'),
                'slug'              => md5(uniqid()),
                'logo'              => '62fa01aa56132.png',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'nama_partner'      => 'Himpunan Perawat Informatika Indonesia',
                'singkatan'         => 'HPII',
                'id_pj'             => 1,
                'nama_pj'           => 'Ns. Khairon, S.Kep., S.Kom., M.Kom., MH.',
                'email'             => 'khaironbiz@gmail.com',
                'hp'                => '081213798746',
                'website'           => 'https://hpii.or.id',
                'nomor_sk'          => rand(100000,999999),
                'tanggal_sk'        => date('Y-m-d H:i:s'),
                'valid_to'          => date('Y-m-d H:i:s'),
                'slug'              => md5(uniqid()),
                'logo'              => '62f9ffddd69a5.png',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'nama_partner'      => 'Dewan Pengurus Komisariat PPNI RSPON',
                'singkatan'         => 'DPK PPNI RSPON',
                'id_pj'             => 1,
                'nama_pj'           => 'Ns. Khairon, S.Kep., S.Kom., M.Kom., MH.',
                'email'             => 'khaironbiz@gmail.com',
                'hp'                => '081213798746',
                'website'           => 'https://hpii.or.id',
                'nomor_sk'          => rand(100000,999999),
                'tanggal_sk'        => date('Y-m-d H:i:s'),
                'valid_to'          => date('Y-m-d H:i:s'),
                'slug'              => md5(uniqid()),
                'logo'              => '62f9e9d67cb01.png',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
        ];
        \DB::table('partners')->insert($data);
    }
}
