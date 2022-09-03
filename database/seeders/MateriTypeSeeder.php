<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class MateriTypeSeeder extends Seeder
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
                'materi_type' => 'Materi Dasar',
                'slug'          => uniqid(),
                'created_by'    => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'materi_type' => 'Materi Inti',
                'slug'          => uniqid(),
                'created_by'    => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'materi_type' => 'Materi Penunjang',
                'slug'          => uniqid(),
                'created_by'    => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];
        \DB::table('materi_types')->insert($data);
    }
}
