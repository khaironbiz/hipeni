<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisasiProfesiSeeder extends Seeder
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
                'id_profesi'    => 1,
                'nama_op'       => 'Persatuan Perawat Nasional Indonesia',
                'singkatan'     => 'PPNI',
                'slug_op'       => 'persatuan-perawat-nasional-indonesia',
                'pimpinan'      => 'Dr. Harif Fadilah, S.Kep., SH, MH',
                'alamat'        => 'Jl. Lenteng Agung Raya No.64, RT.6/RW.8, Lenteng Agung, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12610',
                'email'         => 'dpp@ppni-inna.org',
                'telp'          => '021-22710272',
                'hp'            => '012',
                'web'           => 'https://ppni-inna.org',
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_profesi'    => 2,
                'nama_op'       => 'Ikatan Dokter Indonesia',
                'singkatan'     => 'IDI',
                'slug_op'       => 'ikatan-dokter-ndonesia',
                'pimpinan'      => 'dr. Muhammad Adib Khumaidi, SpOT',
                'alamat'        => 'Jl. Dr. G.S.S.Y. Ratulangi No. 29, Menteng Jakarta Pusat 10350',
                'email'         => 'pbidi@idionline.org',
                'telp'          => '021-3150679',
                'hp'            => '0123',
                'web'           => 'https://idionline.org',
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_profesi'    => 3,
                'nama_op'       => 'Ikatan Bidan Indonesia',
                'singkatan'     => 'IBI',
                'slug_op'       => 'ikatan-bidan-ndonesia',
                'pimpinan'      => 'Dr. Emi Nurjasmi, M.Kes',
                'alamat'        => 'Jl. Johar Baru V No. D13 Jakarta Pusat 10560',
                'email'         => 'ppibi@ibi.or.id',
                'telp'          => '021-4247789',
                'hp'            => '01234',
                'web'           => 'https://ibi.or.id',
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s')
            ],

        ];
        \DB::table('organisasi_profesis')->insert($data);
    }
}
