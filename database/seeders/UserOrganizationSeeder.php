<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id'   => 1,
                'mulai'     => '2010-10-01',
                'selesai'   => '2012-12-31',
                'sebagai'   => 1,
                'nama_organisasi'=> 'PPNI',
                'slug'      => uniqid(),
                'active'    => 0,
                'keterangan'=>'Anggota',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];
        \DB::table('user_organizations')->insert($data);
    }
}
