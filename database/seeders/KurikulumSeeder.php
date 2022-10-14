<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'training_id'   => 1,
                'materi_type_id'=> 1,
                'topik'         => 'Etikolegal Kegawat Daruratan Neurologi',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 1,
                'topik'         => 'Review Anatomi dan Fisiologi Sistem Saraf',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 1,
                'topik'         => 'Pemeriksaan penunjang pada kedaruratan kasus neurologi',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Obat-obatan pada kasus Neuroemergency',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Pengkajian Keperawatan Neurologi',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Tatalaksana Kedaruratan pada pasien Guillen Bare Syndrome dan Myastenia Gravis',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Tatalaksana Kedaruratan pada pasien infeksi sistem saraf pusat',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Tatalaksana Kedaruratan pada pasien kejang',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Tatalaksana Kedaruratan pada pasien stroke',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Tatalaksana Kedaruratan pada pasien trauma kepala',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Tatalaksana Kedaruratan pada pasien trauma medula spinalis',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Tatalaksana Peningkatan Tekanan Intra Kranial',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Terapi Cairan dan Elektrolit pada kedaruratan Neurologi',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Terapi Oksigen pada kedaruratan neurologi',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Anti Korupsi',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Building Learning Commitment',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'training_id'   => 1,
                'materi_type_id'=> 2,
                'topik'         => 'Rencana Tindak Lanjut',
                'penjelasan'    => 'Tujuan',
                'slug'          => md5(uniqid()),
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],

        ];
        \DB::table('kurikulums')->insert($data);
    }
}
