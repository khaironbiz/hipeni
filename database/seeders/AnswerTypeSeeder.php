<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerTypeSeeder extends Seeder
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
                'nama_jawaban'  => 'Pilihan Ganda',
                'tipe_jawaban'  => 'radio',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Ceklist',
                'tipe_jawaban'  => 'checkbox',
                'multiple'      => 1,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Jawaban Pendek',
                'tipe_jawaban'  => 'text',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Jawaban Panjang',
                'tipe_jawaban'  => 'textarea',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Input Tanggal',
                'tipe_jawaban'  => 'date',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Input Bulan',
                'tipe_jawaban'  => 'month',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Input Waktu',
                'tipe_jawaban'  => 'time',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Input Angka',
                'tipe_jawaban'  => 'number',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'nama_jawaban'  => 'Upload File',
                'tipe_jawaban'  => 'file',
                'multiple'      => 0,
                'slug'          => md5(uniqid().rand(1000,9999)),
                'created_at'    => date('Y-m-d H:i:s')
            ],
        ];
        \DB::table('answer_types')->insert($data);
    }
}
