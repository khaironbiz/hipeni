<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultantRoleSeeder extends Seeder
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
                'consultant_role'   => 'Dokter Umum',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'consultant_role'   => 'Dokter Spesialis Neurology',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'consultant_role'   => 'Dokter Spesialis Anak',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'consultant_role'   => 'Dokter Spesialis Obgyn',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'consultant_role'   => 'Perawat',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'consultant_role'   => 'Dietisien',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'consultant_role'   => 'Fisio Terapi',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'consultant_role'   => 'Programmer',
                'is_active'         => true,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
        ];
        \DB::table('consultant_roles')->insert($data);
    }
}
